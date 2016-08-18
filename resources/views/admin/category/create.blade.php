@extends('admin.category', ['option'=>'create'])

@section('mainContent')
    <br>
    <form method="post" action="{{ route('admin.category.store') }}">
        {{csrf_field()}}
        <div class="form-group">
            <label >Category Name</label>
            <input type="text" name="category" required class="form-control" placeholder="Enter the category here...">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection