<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModuleController extends Controller
{
    public function index(): View
    {

        return view('modules.index', [
            'modules' => Module::with('course.user')->latest()->get(),
        ]);

    }

    public function create()
    {
        $courses = Course::all();

        return view('modules.add', compact('courses'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'course_id' => 'required|exists:courses,id',
        ]);

        $module = new Module($validated);

        $course = Course::findOrFail($validated['course_id']);

        $course->modules()->save($module);

        return redirect(route('modules.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        //
    }
}
