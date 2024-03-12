<?php

namespace App\Http\Controllers;

use App\Models\Course;
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:155',
            'descripction' => 'required|string|max:300',
            'fInicio' => 'required',
            'fFinal' => 'required',
        ]);

        $request->user()->courses()->create($validated);

        return redirect(route('cursos-inicio'));
    }
}
