@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1><strong>Gyan Marga</strong>, free interactive vocabulary games.<br><small>Choose a category to get started...</small></h1>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <a href="{{ Request::url()  }}/start"><button type="button" class="btn btn-primary btn-lg btn-block">Start Game</button></a>
            </div>
        </div>
    </div>
@endsection
