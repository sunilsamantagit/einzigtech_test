<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;
use App\Models\Answer;
use App\User;
use Auth;

class SurveyController extends Controller
{
    public function started() {
        $data = array();
        $data['questions'] = Question::orderBy('id', 'asc')->get();
        return view('started',$data);
     }
     
     public function formPost(Request $request)
    {  
         
            $answer = new Answer;
            $answer->user_id = Auth::user()->id;
            $answer->ques_id = (empty($request->ques_id1))? '':$request->ques_id1;
            $answer->marks = (empty($request->option1))? 0:$request->option1;
            $answer->save();    
            
            $answer = new Answer;
            $answer->user_id = Auth::user()->id;
            $answer->ques_id = (empty($request->ques_id2))? '':$request->ques_id2;
            $answer->marks = (empty($request->option2))? 0:$request->option2;
            $answer->save();
            
            $answer = new Answer;
            $answer->user_id = Auth::user()->id;
            $answer->ques_id = (empty($request->ques_id3))? '':$request->ques_id3;
            $answer->marks = (empty($request->option3))? 0:$request->option3;
            $answer->save();
            
            $answer = new Answer;
            $answer->user_id = Auth::user()->id;
            $answer->ques_id = (empty($request->ques_id4))? '':$request->ques_id4;
            $answer->marks = (empty($request->option4))? 0:$request->option4;
            $answer->save();
            
            $answer = new Answer;
            $answer->user_id = Auth::user()->id;
            $answer->ques_id = (empty($request->ques_id5))? '':$request->ques_id5;
            $answer->marks = (empty($request->option5))? 0:$request->option5;
            $answer->save();
            
            $data['is_attempt_now']=1;
            return view('dashboard',$data);
    }
}
