<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    public function create()
    {
        return view('students/create');
    }

    public function store(Request $request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->age = $request->age;
        $student->IDno = $request->IDno;
        $student->save();
        return redirect('/students/create');
    }

    public function index()
    {
        $all_students = Student::all();
        return view('students.index', ['students' => $all_students]);
    }


    public function edit($id)
    {
        return view('students.edit', [
            'student' => Student::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->name;
        $student->age = $request->age;
        $student->IDno = $request->IDno;
        if ($student->save()) {
            return redirect()->route('students.index');
        }
    }
    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Student not found');
        }
        $student->delete();
        return redirect()->route('students.index');
    }

}
