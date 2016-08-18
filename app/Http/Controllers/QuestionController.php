<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Category;
use App\Question;
use Illuminate\Http\Request;

use App\Http\Requests;

class QuestionController extends Controller
{
    protected $question;
//    protected $answer;
    
    public function __construct(Question $question)
    {
        $this->question = $question;
//        $this->answer = $answer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = $this->question->load('category', 'answer')->paginate(10);
        return view('admin.question.index', compact('questions'));
//        return $questions;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.question.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $answer = new Answer(['statement'=>$request->get('answer'), 'level'=>$request->get('level'), 'category_id'=>$request->get('category')]);
        $answer->save();
        
        $this->question->create([
            'statement'=>$request->get('statement'), 
            'level'=>$request->get('level'), 
            'category_id'=>$request->get('category'), 
            'type'=>1, 
            'answer_id'=> $answer->id,
        ]);
        
        return redirect(route('admin.questions.index'))->with('message','Question saved');
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
