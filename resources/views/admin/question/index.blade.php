@extends('admin.question', ['option'=>'index'])

@section('mainContent')
    @if( Session::has('message') )
        <br>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('message') }}
        </div>
    @endif
    <br>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Category</th>
            <th>Question</th>
            <th>Answer</th>
            <th>Level</th>
            <th>Type</th>
            <th>Created on</th>
            <th>Delete?</th>
        </tr>
        </thead>
        <tbody>
        @foreach($questions as $question)
            <tr>
                <th scope="row">{{ $question->id }}</th>
                <td>{{ $question->category->name }}</td>
                <td>{{ $question->statement }}</td>
                <td>{{ $question->answer->statement }}</td>
                <td>{{ $question->level }}</td>
                <td>{{ $question->type }}</td>
                <td>{{ $question->created_at }}</td>
                <td><a href="#"><i class="fa fa-times alert-danger" aria-hidden="true"></i></a> </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $questions->render() !!}
@endsection
