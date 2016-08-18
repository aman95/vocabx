@extends('admin.category', ['option'=>'index'])

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
            <th>Category Name</th>
            <th>Created on</th>
            <th>Delete?</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
            <th scope="row">{{ $category->id }}</th>
            <td>{{ $category->name }}</td>
            <td>{{ $category->created_at }}</td>
            <td><a href="#"><i class="fa fa-times alert-danger" aria-hidden="true"></i></a> </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
