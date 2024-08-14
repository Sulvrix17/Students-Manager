<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view("students.index", ['students' => $students]);
    }

    public function show(Student $student)
    {
        return view('students.show', ['student' => $student]);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {

        // $student = Student::create($request->all());
        $data = $request->validate([ //An alternative for the all() adding constraints to the input
            "regNo" => ['required', 'unique:students'],
            "first" => ['required', 'between:3,16'],
            "middle" => ['required', 'between:3,16'],
            "last" => ['required', 'between:3,16'],
            "age" => ['required'],
            "gender" => ['required'],
            "address" => ['required']
        ]);

        Student::create($data);
        return to_route('students.index');
    }

    public function edit(Student $student)
    {
        return view('students.edit', ['student' => $student]);
    }

    public function update(Request $request, $studentId)
    {

        $student = Student::findOrFail($studentId);
        $request->validate([
            'regNo' => ['unique:students,regNo,' . $studentId],
        ]);

        $student->update($request->all());
        return to_route('students.show', $studentId);
    }

    public function destroy($studentId)
    {

        Student::destroy($studentId);
        return to_route('students.index');
    }
}
