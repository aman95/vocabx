@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h1><strong>Gyan Marga</strong><br><small>Choose a category to get started...</small></h1>
    </div>
    <div class="row">
        @foreach($categories as $category)
            <div class="col-sm-4" style="margin-top: 20px">
                <div class="dropdown">
                    <button class="btn btn-primary btn-lg btn-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        {{ $category->name }}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="{{ route('quiz', ['catId'=>$category->id, 'level'=>1]) }}">Level 1</a></li>
                        <li><a href="{{ route('quiz', ['catId'=>$category->id, 'level'=>2]) }}">Level 2</a></li>
                        <li><a href="{{ route('quiz', ['catId'=>$category->id, 'level'=>3]) }}">Level 3</a></li>
                        <li><a href="{{ route('quiz', ['catId'=>$category->id, 'level'=>4]) }}">Level 4</a></li>
                        <li><a href="{{ route('quiz', ['catId'=>$category->id, 'level'=>5]) }}">Level 5</a></li>
                    </ul>
                </div>
            </div>
        @endforeach
        <div class="col-sm-4" style="margin-top: 20px">
            <a href="{{url('/essays')}}"><button class="btn btn-primary btn-lg btn-block" type="button" aria-expanded="true">
                Essay Writing
            </button></a>
        </div>
        <div class="col-sm-4" style="margin-top: 20px">
            <a href="{{url('/learn/meanings')}}"><button class="btn btn-primary btn-lg btn-block" type="button" aria-expanded="true">
                Learn Vocabulary
            </button></a>
        </div>
    </div>
</div>
@endsection
