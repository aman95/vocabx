<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Category;
use App\Question;
use App\Quiz;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    protected $quiz;
    protected $question;
    protected $answer;

    public function __construct(Quiz $quiz, Question $question, Answer $answer)
    {
        $this->quiz = $quiz;
        $this->answer = $answer;
        $this->question = $question;
    }

//    public function index() {
//        return view('admin.index');
//    }
    
    public function instruction($catId, $level)
    {
        return view('quiz.quiz');
    }
    
    public function createQuiz($catId, $level)
    {
//        $id = DB::table('quizzes')->max('id')+1;
//        $r = mt_rand(10000,99999);
//        $uri = base_convert($id.$r,10,36);
//
//        $questions = $this->question->inRandomOrder()->where(['level'=>$level, 'category_id'=>$catId])->limit(10)->select(['id','answer_id'])->get();
//        $this->quiz->create([
//            'type'=>1,
//            'level'=>$level,
//            'category_id'=>$catId,
//            'uri'=>$uri,
//            'questions'=> json_encode($questions),
//        ]);
//        return redirect(route('quiz.uri',['uri'=>$uri]))->with('action','start');

        $id = DB::table('quizzes')->max('id')+1;
        $r = mt_rand(10000,99999);
        $uri = base_convert($id.$r,10,36);

        $questions = $this->question->inRandomOrder()->where(['level'=>$level, 'category_id'=>$catId])->limit(10)->select(['id'])->get();
        $this->quiz->create([
            'type'=>1,
            'level'=>$level,
            'category_id'=>$catId,
            'uri'=>$uri,
            'questions'=> json_encode($questions),
        ]);
        return redirect(route('quiz.uri',['uri'=>$uri]))->with('action','start');
    }

    public function runQuiz($uri)
    {
//        if(Session::has('action')) {
//            $q = $this->quiz->where(['uri'=>$uri])->first();
//            $ques = json_decode($q->questions);
//            $question = $this->question->find($ques[0]->id);
//            $incorrect = $this->answer->inRandomOrder()->where('id','!=',$ques[0]->answer_id)->limit(3)->get();
//            $correct = $this->answer->find($ques[0]->answer_id);
//            $options = array($incorrect[0],$incorrect[1],$incorrect[2],$correct);
//            shuffle($options);
//            $time_token = Crypt::encrypt(\Carbon\Carbon::now());
//            return view('quiz.start',compact('options','question','uri', 'time_token'));
//        } else {
//            return $this->quiz->where(['uri'=>$uri])->first();
//        }
        if(Session::has('action')) {
            $q = $this->quiz->where(['uri'=>$uri])->first();
            $ques = json_decode($q->questions);
            $question = $this->question->find($ques[0]->id);
            $options = array($question->correct_answer,$question->option1,$question->option2,$question->option3);
            shuffle($options);
            $time_token = Crypt::encrypt(\Carbon\Carbon::now());
            return view('quiz.start',compact('options','question','uri', 'time_token'));
        } else {
            $quiz = $this->quiz->where(['uri'=>$uri])->first();
            if(!$quiz) {
                abort(404);
            }
            $category = Category::findOrFail($quiz->category_id);
            return view('quiz.completed', compact('quiz', 'category'));
        }


    }

    public function ansWithNextQue(Request $request, $uri, $qno)
    {
//        try {
//            $decrypted = Crypt::decrypt($request->get('time_token'));
//            $oldTime = new \Carbon\Carbon($decrypted);
//            $time = \Carbon\Carbon::now();
//            $diff = $time->diffInSeconds($oldTime);
//        } catch (DecryptException $e) {
//            return response()->json(['result'=> false, 'msg'=>'Something Fishy!!!']);
//        }
//
//        if($diff < 16) {
//            $point = 20-$diff+1;
//        } else {
//            $point = 0;
//        }
//        $point = 20;
//
//        $q = $this->quiz->where(['uri'=>$uri])->first();
//
//        $ques = json_decode($q->questions);
//        $answer = $this->answer->find($ques[$qno-1]->answer_id);
//
//
//        if($answer->statement === $request->get('answer')) {
//            $status = true;
//            $statement = $answer->statement;
//            $q->points += $point;
//            $userAns = json_decode($q->answers);
//            $userAns[$qno-1] = array('isCorrect'=>true, 'point'=>$point,'ques_id'=>$ques[$qno-1]->id);
//            $q->answers = json_encode($userAns);
//            $q->save();
//        } else {
//            $status = false;
//            $statement = $answer->statement;
//            $userAns = json_decode($q->answers);
//            $userAns[$qno-1] = array('isCorrect'=>false, 'point'=>0, 'ques_id'=>$ques[$qno-1]->id);
//            $q->answers = json_encode($userAns);
//            $q->save();
//        }
//
//        if($qno === '10') {
//            $q->isCompleted = true;
//            $q->save();
//            $res = array(
//                'completed'=>true,
//                'status'=>$status,
//                'answer'=>$statement,
//                'points'=>$q->points,
//                'time_token'=>Crypt::encrypt(\Carbon\Carbon::now()));
//
//            return JsonResponse::create($res);
//        }
//
//        $question = $this->question->find($ques[$qno]->id);
//
//        $incorrect = $this->answer->inRandomOrder()->where('id','!=',$ques[$qno]->answer_id)->select(['statement'])->limit(3)->get();
//        $correct = $this->answer->where('id',$ques[$qno]->answer_id)->select('statement')->first();
//        $options = array($incorrect[0],$incorrect[1],$incorrect[2],$correct);
//        shuffle($options);
//        $res = array(
//            'completed'=>false,
//            'status'=>$status,
//            'answer'=>$statement,
//            'nextQuestion'=>$question->statement,
//            'options'=>$options,
//            'points'=>$q->points,
//            'time_token'=>Crypt::encrypt(\Carbon\Carbon::now()));
//
//        return JsonResponse::create($res);

        try {
            $decrypted = Crypt::decrypt($request->get('time_token'));
            $oldTime = new \Carbon\Carbon($decrypted);
            $time = \Carbon\Carbon::now();
            $diff = $time->diffInSeconds($oldTime);
        } catch (DecryptException $e) {
            return response()->json(['result'=> false, 'msg'=>'Something Fishy!!!']);
        }

        if($diff < 16) {
            $point = 20-$diff+1;
        } else {
            $point = 0;
        }
        $point = 20;

        $q = $this->quiz->where(['uri'=>$uri])->first();

        $ques = json_decode($q->questions);
        $answer = ($this->question->findOrFail($ques[$qno-1]->id))->correct_answer;


        if($answer === $request->get('answer')) {
            $status = true;
            $statement = $answer;
            $q->points += $point;
            $userAns = json_decode($q->answers);
            $userAns[$qno-1] = array('isCorrect'=>true, 'point'=>$point,'ques_id'=>$ques[$qno-1]->id);
            $q->answers = json_encode($userAns);
            $q->save();
        } else {
            $status = false;
            $statement = $answer;
            $userAns = json_decode($q->answers);
            $userAns[$qno-1] = array('isCorrect'=>false, 'point'=>0, 'ques_id'=>$ques[$qno-1]->id);
            $q->answers = json_encode($userAns);
            $q->save();
        }

        if($qno === '10') {
            $q->isCompleted = true;
            $q->save();
            $res = array(
                'completed'=>true,
                'status'=>$status,
                'answer'=>$statement,
                'points'=>$q->points,
                'time_token'=>Crypt::encrypt(\Carbon\Carbon::now()));

            return JsonResponse::create($res);
        }

        $question = $this->question->find($ques[$qno]->id);

//        $incorrect = $this->answer->inRandomOrder()->where('id','!=',$ques[$qno]->answer_id)->select(['statement'])->limit(3)->get();
//        $correct = $this->answer->where('id',$ques[$qno]->answer_id)->select('statement')->first();
        $options = array($question->correct_answer,$question->option1,$question->option2,$question->option3);
        shuffle($options);
        $res = array(
            'completed'=>false,
            'status'=>$status,
            'answer'=>$statement,
            'nextQuestion'=>$question->statement,
            'options'=>$options,
            'points'=>$q->points,
            'time_token'=>Crypt::encrypt(\Carbon\Carbon::now()));

        return JsonResponse::create($res);
    }
}
