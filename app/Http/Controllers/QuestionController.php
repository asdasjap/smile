<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index() {
        $questions = Question::all();
        $answerGroup = [
            '0' => 0, 
            '1' => 1, 
            '2' => 2, 
            '3' => 3, 
            '4' => 4, 
        ];
        $newQuestions = collect($questions)->map(function($question) use($answerGroup) {
            
            if($question->reverse) {
                $question->answers = array_reverse($answerGroup);
            } else {
                $question->answers = $answerGroup;
            }
            
            return $question;
        });
    
        return view('dashboard.exam')->with('questions', $newQuestions);
    }
}
