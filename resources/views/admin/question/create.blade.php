@extends('admin.question', ['option'=>'create'])

@section('mainContent')
    <br>
    <form method="post" action="{{ route('admin.questions.store') }}">
        {{csrf_field()}}
        <div class="form-group">
            <label >Question Statement</label>
            <input type="text" required class="form-control" name="statement" placeholder="Enter the question here...">
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
        <div class="form-group">
            <label >Type</label>
            <select class="form-control" name="type">
                <option value="1">MCQ (Single correct)</option>
                <option value="2">MCQ (Multiple correct)</option>
                <option value="3">True / False</option>
            </select>
        </div>
        <div class="form-group">
            <label >Correct answer</label>
            <input type="text" required class="form-control" name="answer" placeholder="Enter correct answer...">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
