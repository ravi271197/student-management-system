<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $students_arr = array();
        $id = Auth::user()->id;

        $students = User::where('role_id',3)->where('teacher_id', $id)->get();
        if (isset($students) && !empty($students)) {
            $students_arr = $students;
        }

        return view('students.index',['students' => $students_arr]);
    }

    public function create(){
        return view('students.create');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|unique:users|email',
            'password'=>'required'
        ]);

        $user =  new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = 3;
        $user->teacher_id = Auth::user()->id;
        $user->save();

        return redirect()->route('students');

    }

    public function edit($id){

        $student_arr = array();

        $student = User::find($id);
        if (isset($student) && !empty($student)) {
            $student_arr = $student;
        }

        return view('students.edit',['student' => $student_arr]);
    }

    public function update(Request $request, $id){

        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            
        ]);

        $student = User::find($id);
        if(!$student){
            return redirect()->route('admin.teachers')->with('error','Student not exists');
        }
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->save();

        return redirect()->route('students');
    }

    public function delete($id) {

        $student = User::find($id);
        if(!$student){
            return redirect()->route('students')->with('error','Student not exists');
        }
        $student->delete();
        return redirect()->route('students');
    }
    
    

}
