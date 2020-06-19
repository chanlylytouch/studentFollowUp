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
        // return view('home',compact('students'));
        return view('home',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        

        // $picture = $request->file('Picture');
        // $destinationPath = 'public/img/';
        // $originalFile = $picture->getClientOriginalName();
        // $picture->move($destinationPath, $originalFile);

        
        // if($request->hasFile('avatar')){
    	// 	$avatar = $request->file('picture');
    	// 	$filename = time() . '.' . $avatar->getClientOriginalExtension();
        //     Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
        
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
        // $student->picture = $request->get('picture');
        $student->class = $request->get('class');
        $student->description = $request->get('description');
        $student->user_id = auth::id();
        $student->save();
        // }
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
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
        // dd($students);
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
            $student ->picture = "student.png";
        }else {
            request()->validate([
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.request()->picture->getClientOriginalExtension();
            request()->picture->move(public_path('/img/'), $imageName);
            $student ->picture = $imageName;
        }
        // $student->picture = $request->get('picture');
        $student->class = $request->get('class');
        $student->description = $request->get('description');
        $student->user_id = auth::id();
        $student->save();
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    //out of follow up table
    public function outFollowup(){
        return view('student.studentOutFollowup');
    }
}
