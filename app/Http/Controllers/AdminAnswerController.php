<?php
namespace LearnLaravel\Http\Controllers;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use LearnLaravel\AnswerResponse;
use LearnLaravel\Http\Requests;
use LearnLaravel\QAnswer;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller{

    public  function postAnswer(Request $request){
        $status='a';
        $userId = Auth::id();
        $question_id=$request->q_id;
        //Validation later
        if ($request->post == "Post") {
            //var_dump($userId);
            $answer = new QAnswer();
            $answer->body = $request['ans_body'];
            $answer->status = $status;
            $answer->user_id = $userId;
            $answer->question_id = $question_id;
//            if ($request['file'] != null) {
//                $image1=$request->file('ans_file');
//                var_dump($image1);
//                return $image1 ;
//            }
            $answer->image="No Image";
            $answer->save();
            $question_id=$request->q_id;
            $question_title=$request->q_title;
            $question_body=$request->q_content;
            $answers =  DB::select("SELECT * FROM q_answers WHERE question_id='$question_id'");
            $users= DB::select("SELECT * FROM new_users");
            return view('pages.UserAnswers',compact('answers','question_title','question_body','question_id','users'));

        }
    }

    public  function  answerControl(Request $request){
        $ans_id=$request->ans_id;
        $current_user=Auth::id();
        $ans_user_id=$request->ans_user_id;
        $response_chance="1";
        $answer= QAnswer::find($ans_id);
        $ans_response=DB::select("SELECT * FROM answer_responses where answer_id='$ans_id'");
        if ($request->delete=="Delete"){
            //var_dump($ans_id);
            $answer->delete();
        }
        foreach ($ans_response as $ansr){
            if( $ansr->response_user_id==$current_user){
                $response_chance="0";
            }
                //var_dump($ansr->response_user_id);
        }
        if ($request->agree=="Agree" and $response_chance=="1"){

            $ans_response= new AnswerResponse();
            $ans_response->response_user_id=$current_user;
            $ans_response->answer_id=$ans_id;
            $ans_response->response="A";
            //var_dump("Success");
            $ans_response->save();
        }
        if ($request->disagree=="Disagree" and $response_chance=="1"){

            $ans_response= new AnswerResponse();
            $ans_response->response_user_id=$current_user;
            $ans_response->answer_id=$ans_id;
            $ans_response->response="D";
            //var_dump("Success");
            $ans_response->save();
        }
        if ($request->report=="Report" and $response_chance=="1"){

            $ans_response= new AnswerResponse();
            $ans_response->response_user_id=$current_user;
            $ans_response->answer_id=$ans_id;
            $ans_response->response="R";
            $ans_response->save();
        }
        $question_id=$request->q_id;
        $question_title=$request->q_title;
        $question_body=$request->q_content;
        $answers =  DB::select("SELECT * FROM q_answers WHERE question_id='$question_id'");
        $users= DB::select("SELECT * FROM new_users");
        return view('pages.UserAnswers',compact('answers','question_title','question_body','question_id','users'));

    }
}