@extends('admin.essay', ['option'=>'index'])

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
            <th>Essay Topic</th>
            <th>Created on</th>
            <th>Delete?</th>
        </tr>
        </thead>
        <tbody>
        @foreach($essays as $essay)
            <tr>
                <th scope="row">{{ $essay->id }}</th>
                <td>{{ $essay->topic }}</td>
                <td>{{ $essay->created_at }}</td>
                <td><a href="#"><i class="fa fa-times alert-danger" aria-hidden="true"></i></a> </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
