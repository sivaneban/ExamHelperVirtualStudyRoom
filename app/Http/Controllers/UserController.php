<?php

namespace LearnLaravel\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use LearnLaravel\Http\Requests;

class UserController extends Controller
{
    //
    public function adminUserControl(){
        $users = DB::select('Select UserID,UserName,status from user');
        $courses = DB::select('Select course_id,course_name from course');

        return view('pages.AdminUC',compact('users','courses'));
    }
    public function activation(Request $request){
        //var_dump($request);
        $user_id=$request['u_id'];
        $user_status=$request['u_status'];
        if ($user_status=='a'){
            //var_dump($user_status);
            DB::table('user')
                ->where('UserID', @$user_id)
                ->update(['status' => 's']);

        }elseif ($user_status=='s'){
            DB::table('user')
                ->where('UserID', @$user_id)
                ->update(['status' => 'a']);
        }
        //var_dump($request['u_status']);
        return redirect()-> back();
    }

    public function getQuestionPage(Request $request){
        $course_name=(String)$request->coursename;
        $course_id =  DB::select("SELECT course_id FROM course where course_name='$course_name'");
        foreach ($course_id as $course_id){
            $courseId=$course_id->course_id;
        }
        $questions =  DB::select("SELECT * FROM question where course_id='$courseId'");


        if($request->search=="Select"){
            //var_dump("sabjdabjsa");
            return view('pages.AdminCourse',compact('questions','course_name'));
        }

    }

}
