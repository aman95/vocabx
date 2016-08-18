<?php

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
    return json_encode(new \Carbon\Carbon('2016-08-18 05:28:19'));
});


Route::get('/games/category/{catId}/level/{level}', ['as'=>'quiz', 'uses'=>'QuizController@instruction']);

Route::get('/games/category/{catId}/level/{level}/start', ['as'=>'quiz.start', 'uses'=>'QuizController@createQuiz']);

Route::get('/game/{uri}', ['as'=>'quiz.uri', 'uses'=>'QuizController@runQuiz']);

Route::post('/game/{uri}/answer/{qno}', ['as'=>'quiz.answer', 'uses'=>'QuizController@ansWithNextQue']);

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::resource('/admin/questions', 'QuestionController');
Route::resource('/admin/category', 'CategoryController');
Route::resource('/admin/answers', 'AnswerController');
