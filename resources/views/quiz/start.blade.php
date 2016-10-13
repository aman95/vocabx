@extends('layouts.app')

@section('meta')
    <meta name="game_token" content="{{$uri}}">
    <meta name="time_token" content="{{$time_token}}">
@endsection

@section('content')
    <div class="container">
        <div class="page-header">
            <h1><strong>Gyan Marga</strong><br><small>Quiz is started...</small></h1>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="text-center" id="timer">
                    <h1><strong>00:15</strong></h1>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-1">
                <div class="text-center" id="points">
                    <h1><strong>Points: 0</strong></h1>
                </div>
            </div>
        </div>


        <div class="center-block" id="queStatement">
            <h2>Q1. {{ $question->statement }}<br><small>Choose one option:</small></h2>
        </div>
        <div class="row" id="options">
            @foreach($options as $option)
                <div class="col-sm-6" style="margin-top: 20px">
                    <button type="button" class="btn btn-default btn-lg btn-block option">{{ $option }}</button>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-sm-4 col-md-offset-4" style="margin-top: 20px">
                <button type="button"  id="nextQuestion" class="btn btn-primary btn-lg btn-block" disabled="disabled">Next Question</button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="/scripts/game.js"></script>
@endsection