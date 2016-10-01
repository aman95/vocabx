@extends('layouts.admin',['option'=>'essay'])

@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
            <li role="presentation" class="@if($option === 'index') active @endif"><a href="{{ route('admin.essays.index') }}">All Topics</a></li>
            <li role="presentation" class="@if($option === 'create') active @endif"><a href="{{ route('admin.essays.create') }}">Create Topic</a></li>
            {{--<li role="presentation" class="@if($option === 'delete') active @endif"><a href="{{ route('admin.questions.destroy') }}">Delete questions</a></li>--}}
        </ul>
        @yield('mainContent')

    </div>
@endsection