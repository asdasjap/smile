<?php

use App\Models\Question;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.home');
})->middleware(['auth', 'examNotTaken'])->name('dashboard');

Route::get('/exam', function () {
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
})->middleware(['auth', 'examTaken'])->name('exam');

Route::post('/exam', function () {
    $total = 0;
    $score = 0;
    foreach (request()->all() as $key => $answer) { 
        // dd(gettype((float)$answer));

        if(!($key === '_token')) {
            $total += (int)$answer;
        }
    }
    // 0-13 14-26 27-40    
    if(0 < $total && $total < 14) {
        $score = 1;
    } elseif(14 < $total && $total < 27) {
        $score = 2;
    } else {
        $score = 3;
    }
    
    $id = auth()->user()->id;
    $user = \App\Models\User::find($id);
    $user->score = $score;
    $user->save();

    return redirect()->route('dashboard');

})->middleware(['auth', 'examTaken']);
// Route::get('/admintest', function () {
//     return "string";
// })->middleware(['auth','isAdmin']);

require __DIR__.'/auth.php';
