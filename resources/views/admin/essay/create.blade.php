@extends('admin.essay', ['option'=>'create'])

@section('mainContent')
    <br>
    <form method="post" action="{{ route('admin.essays.store') }}">
        {{csrf_field()}}
        <div class="form-group">
            <label >Essay Topic</label>
            <input type="text" name="topic" required class="form-control" placeholder="Enter the topic here...">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection