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
                {{--<option value="5">5</option>--}}
            </select>
        </div>
        <div class="form-group">
            <label >Type</label>
            <select class="form-control" name="type">
                <option value="1">MCQ (Single correct)</option>
                {{--<option value="2">MCQ (Multiple correct)</option>--}}
                {{--<option value="3">True / False</option>--}}
            </select>
        </div>
        <div class="form-group">
            <label >Correct answer</label>
            <input type="text" required class="form-control" name="answer" placeholder="Enter correct answer...">
        </div>
        <div class="form-group">
            <label >Option 1</label>
            <input type="text" required class="form-control" name="option1" placeholder="Enter option 1 answer...">
        </div>
        <div class="form-group">
            <label >Option 2</label>
            <input type="text" required class="form-control" name="option2" placeholder="Enter option 2 answer...">
        </div>
        <div class="form-group">
            <label >Option 3</label>
            <input type="text" required class="form-control" name="option3" placeholder="Enter option 3 answer...">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
