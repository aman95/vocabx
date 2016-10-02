@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1><strong>Learn Word Meanings</strong><br>
            </h1>
        </div>
        @if($meaning == null)
            <div class="center-block">
                <h3>No words left...</h3>
            </div>
            <div class="row" style="margin-top:30px">
                <div class="col-md-4 col-md-offset-4">
                    <a href="{{url('/learn/meanings')}}"><button class="btn btn-primary btn-lg btn-block" type="button" aria-expanded="true">
                            Restart
                        </button></a>
                </div>
            </div>
        @else
        <div class="row">
            <div class="col-md-4">
                <img src="{{ $meaning->image }}" alt="{{ $meaning->word }}" class="img-responsive" width="200" height="200">
            </div>
            <div class="col-md-8">
                <h2>{{ $meaning->word }}</h2>
                <h4 class="text-muted">{{ $meaning->meaning }}</h4>
            </div>
        </div>
        <div class="row" style="margin-top:30px">
            <div class="col-md-4 col-md-offset-4">
                <a href="{{url('/learn/meanings')}}"><button class="btn btn-primary btn-lg btn-block" type="button" aria-expanded="true">
                        Next Word
                </button></a>
            </div>
        </div>
        @endif
    </div>
@endsection