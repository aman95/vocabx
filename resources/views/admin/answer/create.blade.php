@extends('admin.answer', ['option'=>'create'])

@section('mainContent')
    <br>
    <form method="post" action="{{ route('admin.answers.store') }}">
        {{csrf_field()}}
        <div class="form-group">
            <label >Answer Statement</label>
            <input type="text" required class="form-control" name="statement" placeholder="Enter the answer/option here...">
        </div>
        <div class="form-group">
            <label >Category</label>
            <select class="form-control" name="category">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label >Level</label>
            <select class="form-control" name="level">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection