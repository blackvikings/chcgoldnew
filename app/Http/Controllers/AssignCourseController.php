<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Group;
use App\User;
use App\Lesson;

class AssignCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($course_id)
    {
        $students = User::whereHas(
            'roles', function($q){
                $q->where('name', 'student');
            }
        )->with('courses')->get();
        $groups = Group::withCount('users')->with('courses')->get();
        $course = Course::where('id', $course_id)->first();
        $totalLessons = Lesson::where('course_id', $course_id)->count();
        return view('admin.courseassign.index', ['course' => $course, 'groups' => $groups, 'students' => $students, 'totalLessons' => $totalLessons, 'course_id' => $course_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function assignstudent(Request $request)
    {
        $student_id = $request->student_id;
        $course_id = $request->course_id;

        // echo $student_id.'<br>';
        // echo $course_id;die;

        $student = User::where('id', $student_id)->with('courses')->first();

        if (isset($student->courses[0])) 
        {
            foreach ($student->courses as $course) 
            {
                if($course->id == $course_id)
                {
                    $course = Course::where('id', $course_id)->first();
                    $student->courses()->detach($course);
                    echo "This course removed access succfully from student!!";
                    exit;
                }
                
            }    
            $course = Course::where('id', $course_id)->first();
            $student->courses()->attach($course);
            return "This Course assigned to student";                
        }
        else
        {
            $course = Course::where('id', $course_id)->first();
            $student->courses()->attach($course);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assigngroup(Request $request)
    {
        $group_id = $request->group_id;
        $course_id = $request->course_id;

        // print_r($request->all());die;

        $group = Group::where('id', $group_id)->with('courses')->first();

        if (isset($group->courses[0])) 
        {
            foreach ($group->courses as $course) 
            {
                if($course->id == $course_id)
                {
                    $course = Course::where('id', $course_id)->first();
                    $group->courses()->detach($course);
                    echo "This course removed access succfully from the group!!";
                    exit;
                }
                
            }    
            $course = Course::where('id', $course_id)->first();
            $group->courses()->attach($course);
            return "This Course assigned to the group";                
        }
        else
        {
            $course = Course::where('id', $course_id)->first();
            $group->courses()->attach($course);
            return "This Course assigned to the group";                
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
