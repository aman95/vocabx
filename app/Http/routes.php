<?php

use \Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $categories = \App\Category::all();
    return view('welcome', compact('categories'));
});

Route::get('/test', function () {
////    return json_encode(new \Carbon\Carbon('2016-08-18 05:28:19'));
//    $file = fopen(public_path("antonyms.csv"),"r");
//    $ques = array();
//    $count = 0;
//
//    while(! feof($file)) {
//        $array = fgetcsv($file);
//        if($count > 0) {
//
//            for($i = 1; $i<=4; $i++) {
//                if(!empty($array[$i])) {
////                    $answer = $array[$i];
//                    $level = $i;
////                    $que = array(
////                        'question'=>'Antonym of '.$array[0].' is?',
////                        'level'=>$level,
////                        'answer'=>$answer,
////                        'type'=>1
////                    );
////                    array_push($ques, $que);
//
//                    $answer = \App\Answer::firstOrCreate(['statement'=>$array[$i], 'level'=>$level, 'category_id' => 2]);
//                    \App\Question::create([
//                        'statement'=>'Antonym of '.$array[0].' is?',
//                        'level'=>$level,
//                        'category_id'=>2,
//                        'type'=>1,
//                        'answer_id'=> $answer->id,
//                    ]);
//                }
//            }
//        }
//        $count++;
//    }
////    header('Content-Type: application/json');
////    echo json_encode($ques);
//
//    fclose($file);
//
////    return response()->json($ques);
//    return "Yay";
});

Route::get('/createAdmin', function () {
    $user = \App\User::create(['name' => 'Aman', 'email'=>'aman1995k@gmail.com', 'password'=>bcrypt('qwerty')]);
    return ($user);
});


Route::get('/games/category/{catId}/level/{level}', ['as'=>'quiz', 'uses'=>'QuizController@instruction']);

Route::get('/games/category/{catId}/level/{level}/start', ['as'=>'quiz.start', 'uses'=>'QuizController@createQuiz']);

Route::get('/game/{uri}', ['as'=>'quiz.uri', 'uses'=>'QuizController@runQuiz']);

Route::post('/game/{uri}/answer/{qno}', ['as'=>'quiz.answer', 'uses'=>'QuizController@ansWithNextQue']);

Route::auth();

Route::get('/essays', function () {
    $essays = \App\Essay::all();
    return view('essay.index', compact('essays'));
});
Route::get('/essays/{id}', function ($id) {
    $essay = \App\Essay::find($id);
    return view('essay.show', compact('essay'));
});
Route::get('/learn/meanings', function () {

    $meaning = \App\Meaning::inRandomOrder()->whereNotIn('id', Session::get('viewed',[0]))->first();
    if($meaning == null) {
        Session::remove('viewed');
    } else {
        Session::push('viewed',$meaning->id);
    }
    return view('learn.meaning', compact('meaning'));
});


Route::get('/home', 'HomeController@index');

Route::get('/admin', ['as'=>'admin.index', 'uses'=>'AdminController@index']);
Route::resource('/admin/questions', 'QuestionController');
Route::resource('/admin/category', 'CategoryController');
Route::resource('/admin/answers', 'AnswerController');
Route::resource('/admin/essays', 'EssayController');
Route::resource('/admin/meanings', 'MeaningController');
