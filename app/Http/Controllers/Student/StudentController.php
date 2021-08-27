<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Student\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
    $this->middleware('auth');
  }
    public function index()
    {
        $student = DB::table('users')->where('role', 'student')->get();  
         return view('student.index')->with('student', $student);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create')->with('faculty', Faculty::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>   Hash::make($request->password),
            'faculty' => $request->faculty,
            'role' => 'student'
            
        ]);

        session()->flash('success', 'Student Created Successfully.');
        return redirect(route('student.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $student = DB::table('users')->where('id', $id)->first();
        return view('student.create')->with('student', $student)->with('faculty', Faculty::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {   
        User::where('id', $id)->update([
        'name' => $request->name,
            'email' => $request->email,
            'password' =>   Hash::make($request->password),
            'faculty' => $request->faculty,
            'role' => 'student'
    ]); 
        session()->flash('success', 'Student Updated Successfully.');
        return redirect(route('student.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = User::find($id);
        $student->delete();

        session()->flash('success', 'Student Deleted Successfully.');
        return redirect(route('student.index'));
    }
}
