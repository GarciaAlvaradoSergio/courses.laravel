<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LessonController extends Controller
{
    public function index()
    {
        return view('lessons.index', [
            'lessons' => Lesson::with('module')->latest()->get(),
        ]);
    }

    public function create()
    {
        $modules = Module::all();

        return view('lessons.add', compact('modules'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'module_id' => 'required|exists:modules,id',
        ]);

        $lesson = new Lesson($validated);

        $module = Module::findOrFail($validated['module_id']);

        $module->lessons()->save($lesson);

        return redirect(route('lessons.index'));

    }

    public function show(Lesson $lesson)
    {
        //
    }

    public function edit(Lesson $lesson): View
    {
        $this->authorize('update', $lesson);

        return view('lessons.edit', ['lesson' => $lesson]);
    }

    public function update(Request $request, Lesson $lesson): RedirectResponse
    {
        $this->authorize('update', $lesson);
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'module_id' => 'required|exists:modules,id',
        ]);

        $lesson->update($validated);

        return redirect(route('lessons.index'));
    }

    public function destroy(Lesson $lesson)
    {
        $this->authorize('delete', $lesson);

        $lesson->delete();

        return redirect(route('lessons.index'));
    }
}
