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
            <th>Edit</th>
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
                <td><a href="{{ route('admin.meanings.edit', $meaning->id) }}"><i class="fa fa-pencil-square-o alert-info" aria-hidden="true"></i></a> </td>
                <td>
                    <form method="post" onsubmit="return confirm('Do you really want to delete this?');" action="{{ route('admin.meanings.destroy', $meaning->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit"><i class="fa fa-times alert-danger" aria-hidden="true"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $meanings->render() !!}
@endsection

