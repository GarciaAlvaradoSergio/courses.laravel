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
        $courses = Course::all();

        return view('courses.index', compact('courses'));
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

        $course = new Course();
        $course->title = $validated['title'];
        $course->description = $validated['description'];
        $course->fInicio = $validated['fInicio'];
        $course->fFinal = $validated['fFinal'];

        // Si tienes un usuario asociado al curso, puedes establecer su user_id aquí
        // $course->user_id = $user->id;

        $course->save();

        return redirect()->route('courses.index')->with('success', 'Curso creada exitosamente.');
    }

    public function show(Course $course): View
    {
        return view('components.modal', compact('course'));
    }

    public function edit(Course $course): View
    {

        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course): RedirectResponse
    {
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
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Curso eliminada exitosamente');
    }
}
