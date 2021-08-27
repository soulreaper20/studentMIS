<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Http\Requests\Faculty\CreateFacultyRequest;
use App\Http\Requests\Faculty\UpdateFacultyRequest;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
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
        return view('faculty.index')->with('faculty', Faculty::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faculty.create');
    }

    // public function add($id)
    // {   
    //     $user = DB::table('users')->where('id', $id)->first();
    //     return view('faculty.add')->with('faculty', Faculty::all())->with('user',$user);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Faculty::create([
            'name' => $request->name
        ]);

        session()->flash('success', 'Faculty Created Successfully.');
        return redirect(route('faculty.index'));
    }

    // public function keep(Request $request)
    // {
    //     DB::table('faculty_student')->insert(
    //  array(
    //         'faculty_id'     =>   $request->faculty, 
    //         'student_id'   =>   $request->id
    //  ));
    //     session()->flash('success', 'Faculty Added Successfully.');
    //     return redirect(route('faculty.index'));
    // }

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
    public function edit(Faculty $faculty)
    {
         return view('faculty.create')->with('faculty', $faculty);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFacultyRequest $request, Faculty $faculty)
    {
        $faculty->update([
        'name' => $request->name
    ]); 
        session()->flash('success', 'Faculty Updated Successfully.');
        return redirect(route('faculty.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        session()->flash('success', 'Faculty Deleted Successfully.');
        return redirect(route('faculty.index'));

    }
}
