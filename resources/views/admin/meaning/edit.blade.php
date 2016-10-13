@extends('admin.meaning', ['option'=>'create'])

@section('mainContent')
    <br>
    <form method="POST" action="{{ route('admin.meanings.update', $meaning->id) }}" enctype="multipart/form-data">
        <input name="_method" type="hidden" value="PUT">
        {{csrf_field()}}
        <div class="form-group">
            <label >Word</label>
            <input type="text" name="word" required class="form-control" placeholder="Enter the word here..." value="{{$meaning->word}}">
        </div>
        <div class="form-group">
            <label >Meaning</label>
            <input type="text" name="meaning" required class="form-control" placeholder="Enter the meaning here..."  value="{{$meaning->meaning}}">
        </div>
        <div class="form-group">
            <label >Old Image</label>
            <img src="{{ $meaning->image }}" class="img-responsive", width="200" height="200">
        </div>
        <div class="form-group">
            <label >Image</label>
            <input type="file" name="image" class="form-control" placeholder="Browse">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection