<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Faculty;

class TeacherController extends Controller
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
        $teacher = DB::table('users')->where('role', 'teacher')->get();   
         return view('teacher.index')->with('teacher', $teacher);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create')->with('faculty', Faculty::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $teacher = 'teacher';
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
            'faculty' => $request->faculty,
            'role' => $teacher
        ]);

        session()->flash('success', 'Teacher Created Successfully.');
        return redirect(route('teacher.index'));
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
        $teacher = DB::table('users')->where('id', $id)->first();
        return view('teacher.create')->with('teacher', $teacher)->with('faculty', Faculty::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         User::where('id', $id)->update([
        'name' => $request->name,
            'email' => $request->email,
            'password' =>   Hash::make($request->password),
            'faculty' => $request->faculty,
            'role' => 'teacher'
    ]); 
        session()->flash('success', 'Teacher Updated Successfully.');
        return redirect(route('teacher.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $teacher = User::find($id);
        $teacher->delete();

        session()->flash('success', 'Teacher Deleted Successfully.');
        return redirect(route('teacher.index'));
    }
}
