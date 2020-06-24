<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('home',compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::all();
        $student = new Student();  
        if($request->picture == null){
            $student ->picture = "student.png";
        }else {
            request()->validate([
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.request()->picture->getClientOriginalExtension();
            request()->picture->move(public_path('/img/'), $imageName);
            $student ->picture = $imageName;
        }         
        $student->firstname = $request->get('firstname');
        $student->lastname = $request->get('lastname');  
        $student->tutor= $request->get('tutor');  
        $student->class = $request->get('class');
        $student->description = $request->get('description');
        $student->user_id = auth::id();
        $student->save();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($student)
    {
        $students = Student::find($student);
        return view('student.viewStudent',compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($student)
    {
        $students = Student::find($student);
        return view('student.editStudent',compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $student)
    {
        $student = Student::find($student);
        $student->firstname = $request->get('firstname');
        $student->lastname = $request->get('lastname');
        if($request->picture == null){
            $student ->picture = "icons.png";
        }else {
            request()->validate([
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.request()->picture->getClientOriginalExtension();
            request()->picture->move(public_path('/img/'), $imageName);
            $student ->picture = $imageName;
        }
        $student->class = $request->get('class');
        $student->description = $request->get('description');
        $student->tutor = $request->get('tutor');
        $student->user_id = auth::id();
        $student->save();
        return redirect('/home');
    }

    public function back(){
        return redirect('/home');
    }

    //update status of student to out of follow up
    public function updateActiveFollowup($id){
        $student = Student::find($id);
        $student->activeFollowup = true;
        $student->save();
        return back();
    }
    //update status to follow up
    public function backActiveFollowup($id){
        $student = Student::find($id);
        $student->activeFollowup = false;
        $student->save();
        return back();
    }
}
