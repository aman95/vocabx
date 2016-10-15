@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Essay writing<br>
                {{--<small>Choose a essay topic to get started...</small>--}}
            </h1>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><h4>Topic</h4></th>
                <th><h4>Date</h4></th>
            </tr>
            </thead>
            <tbody>
            @foreach($essays as $essay)
            <tr>
                <th scope="row"><a href="{{ url('/essays/'.$essay->id) }}"><h4>{{$essay->topic }}</h4></a></th>
                {{--<td>{{ $essay->created_at }}</td>--}}
                <td><h4>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($essay->created_at))->toFormattedDateString() }}</h4></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
