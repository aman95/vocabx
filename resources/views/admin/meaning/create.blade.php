@extends('admin.meaning', ['option'=>'create'])

@section('mainContent')
    <br>
    <form method="post" action="{{ route('admin.meanings.store') }}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label >Word</label>
            <input type="text" name="word" required class="form-control" placeholder="Enter the word here...">
        </div>
        <div class="form-group">
            <label >Meaning</label>
            <input type="text" name="meaning" required class="form-control" placeholder="Enter the meaning here...">
        </div>
        <div class="form-group">
            <label >Image</label>
            <input type="file" name="image" required class="form-control" placeholder="Browse">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection