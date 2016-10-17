@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="text-center"><strong>Quiz Summary</strong><br><small>@if(!$quiz->isCompleted)Quiz incomplete @endif</small></h1>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="text-center" id="timer">
                    <h3 style="">Level: {{$quiz->level}}</h3>
                </div>
            </div>

            <div class="col-md-4">
                <div class="text-center" id="timer">
                    <h1 style="color: #2b542c"><strong>Points: {{$quiz->points}}</strong></h1>
                </div>
            </div>

            <div class="col-md-4 ">
                <div class="text-center" id="timer">
                    <h3 style="">{{ $category->name }}</h3>
                </div>
            </div>
        </div>
        <br>
        @if($quiz->isCompleted)
        <?php
            $answers = json_decode($quiz->answers);
        ?>
        @for($i = 0; $i<sizeof($answers);$i++)
            <?php
                $question = \App\Question::findOrFail($answers[$i]->ques_id);
            ?>
            <div class="row">
                <div class="col-md-10" id="queStatement">
                    <h2>Q{{$i+1}}. {{ $question->statement }}<br><small>Correct Answer: <strong>{{$question->correct_answer}}</strong></small></h2>
                </div>
                <div class="col-md-2">
                    @if($answers[$i]->isCorrect)
                        <h2 style="color: green"><strong>+20</strong></h2>
                    @else
                        <h2 style="color: maroon"><strong>+0</strong></h2>
                    @endif
                </div>
            </div>

        @endfor
        <br>
        @endif
    </div>
@endsection
