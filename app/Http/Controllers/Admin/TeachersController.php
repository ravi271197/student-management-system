<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
    public function index()
    {

        $teachers_arr = array();

        $teachers = User::where('role_id', 2)->get();
        if (isset($teachers) && !empty($teachers)) {
            $teachers_arr = $teachers;
        }
        return view('admin.teachers.index', ['teachers' => $teachers_arr]);
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:6',
            'department' => 'required|string',
            'designation' => 'required|string',

        ]);

        $user =  new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->department = $request->department;
        $user->designation = $request->designation;
        $user->role_id = 2;
        $user->save();

        return redirect()->route('admin.teachers');
    }

    public function edit($id)
    {

        $teacher_arr = array();

        $teacher = User::find($id);
        if (isset($teacher) && !empty($teacher)) {
            $teacher_arr = $teacher;
        }

        return view('admin.teachers.edit', ['teacher' => $teacher_arr]);
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'department' => 'required|string',
            'designation' => 'required|string',
        ]);

        $teacher = User::find($id);
        if (!$teacher) {
            return redirect()->route('admin.teachers')->with('error', 'Teacher not exists');
        }
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->department = $request->department;
        $teacher->designation = $request->designation;
        $teacher->save();

        return redirect()->route('admin.teachers');
    }

    public function delete($id)
    {

        $teacher = User::find($id);
        if (!$teacher) {
            return redirect()->route('admin.teachers')->with('error', 'Teacher not exists');
        }
        $teacher->delete();
        return redirect()->route('admin.teachers');
    }

    public function students()
    {

        $all_students = array();

        $students = User::where('role_id', 3)->whereNotNull('teacher_id')->get();
        if (isset($students) && !empty($students)) {
            $all_students = $students;
        }

        return view('admin.students.index', ['students' => $all_students]);
    }
}
