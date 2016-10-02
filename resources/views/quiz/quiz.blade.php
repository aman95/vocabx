@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1><strong>Gyan Marga</strong><br><small>Quiz Rules:</small></h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="list-group">
                    <li class="list-group-item">There will be 10 Questions.</li>
                    <li class="list-group-item">Each question will have only one correct answer</li>
                    <li class="list-group-item">You will have 15 seconds to answer the Question</li>
                    <li class="list-group-item">Each correct answer has +20 points</li>
                    <li class="list-group-item">Each wrong answer will have 0 point</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <a href="{{ Request::url()  }}/start"><button type="button" class="btn btn-primary btn-lg btn-block">Start Game</button></a>
            </div>
        </div>
    </div>
@endsection
