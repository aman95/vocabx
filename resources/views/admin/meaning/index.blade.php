@extends('admin.meaning', ['option'=>'index'])

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
            <th>Image</th>
            <th>Word</th>
            <th>Meaning</th>
            <th>Created on</th>
            <th>Delete?</th>
        </tr>
        </thead>
        <tbody>
        @foreach($meanings as $meaning)
            <tr>
                <th scope="row">{{ $meaning->id }}</th>
                <td><a href="{{ $meaning->image }}" target="_blank"><img class="img-responsive" height="100" width="100" src="{{ $meaning->image }}"></a></td>
                <td>{{ $meaning->word }}</td>
                <td>{{ $meaning->meaning }}</td>
                <td>{{ $meaning->created_at }}</td>
                <td><a href="#"><i class="fa fa-times alert-danger" aria-hidden="true"></i></a> </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $meanings->render() !!}
@endsection
