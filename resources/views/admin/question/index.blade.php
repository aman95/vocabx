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
            <th>Level</th>
            <th>Answer</th>
            {{--<th>Type</th>--}}
            <th>Option 1</th>
            <th>Option 2</th>
            <th>Option 3</th>
            <th>Created on</th>
            <th>Edit?</th>
            <th>Delete?</th>
        </tr>
        </thead>
        <tbody>
        @foreach($questions as $question)
            <tr>
                <th scope="row">{{ $question->id }}</th>
                <td>{{ $question->category->name }}</td>
                <td>{{ $question->statement }}</td>
                <td>{{ $question->level }}</td>
                <td>{{ $question->correct_answer }}</td>
                {{--<td>{{ $question->type }}</td>--}}
                <td>{{ $question->option1 }}</td>
                <td>{{ $question->option2 }}</td>
                <td>{{ $question->option3 }}</td>
                <td>{{ $question->created_at }}</td>
                <td><a href="#"><i class="fa fa-pencil-square-o alert-info" aria-hidden="true"></i></a> </td>
                <td>
                    <form method="post" onsubmit="return confirm('Do you really want to delete this?');" action="{{ route('admin.questions.destroy', $question->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit"><i class="fa fa-times alert-danger" aria-hidden="true"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $questions->render() !!}
@endsection
