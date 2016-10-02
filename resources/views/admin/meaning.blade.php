@extends('layouts.admin',['option'=>'meaning'])

@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
            <li role="presentation" class="@if($option === 'index') active @endif"><a href="{{ route('admin.meanings.index') }}">Meanings</a></li>
            <li role="presentation" class="@if($option === 'create') active @endif"><a href="{{ route('admin.meanings.create') }}">Create Question</a></li>
            {{--<li role="presentation" class="@if($option === 'delete') active @endif"><a href="{{ route('admin.questions.destroy') }}">Delete questions</a></li>--}}
        </ul>
        @yield('mainContent')

    </div>
@endsection