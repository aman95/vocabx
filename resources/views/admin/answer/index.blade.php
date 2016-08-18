@extends('admin.answer', ['option'=>'index'])

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
            <th>Answer</th>
            <th>Level</th>
            <th>Created on</th>
            <th>Delete?</th>
        </tr>
        </thead>
        <tbody>
        @foreach($answers as $answer)
            <tr>
                <th scope="row">{{ $answer->id }}</th>
                <td>{{ $answer->category->name }}</td>
                <td>{{ $answer->statement }}</td>
                <td>{{ $answer->level }}</td>
                <td>{{ $answer->created_at }}</td>
                <td><a href="#"><i class="fa fa-times alert-danger" aria-hidden="true"></i></a> </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $answers->render() !!}
@endsection
