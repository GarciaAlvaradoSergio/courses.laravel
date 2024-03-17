<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        return view('courses.index', [
            'courses' => Course::with('user')->latest()->get(),
        ]);

    }

    public function create(): View
    {
        return view('courses.add');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:155',
            'description' => 'required|string|max:300',
            'fInicio' => 'required',
            'fFinal' => 'required',
        ]);

        $request->user()->courses()->create($validated);

        return redirect(route('courses.index'));

    }

    public function show(Course $course): View
    {
        return view('components.modal', compact('course'));
    }

    public function edit(Course $course): View
    {
        $this->authorize('update', $course);

        return view('courses.edit', ['course' => $course]);
    }

    public function update(Request $request, Course $course): RedirectResponse
    {

        $this->authorize('update', $course);
        $validatedData = $request->validate([
            'title' => 'required|string|max:155',
            'description' => 'required|string|max:300',
            'fInicio' => 'required',
            'fFinal' => 'required',
        ]);

        // Actualizar el curso con los datos validados
        $course->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'fInicio' => $validatedData['fInicio'],
            'fFinal' => $validatedData['fFinal'],
        ]);

        return redirect()->route('courses.index')->with('success', 'Curso actualizado exitosamente.');
    }

    public function destroy(Course $course): RedirectResponse
    {
        $this->authorize('delete', $course);
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Curso eliminado exitosamente');
    }
}
