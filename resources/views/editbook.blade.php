@extends('mainview')
@section('content')
<div class="container">
    <h3>Edit Book</h3>

    <form action="{{ url('/updatebook/'.$findBooks->id) }}" method="post" class="form-group" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="booksName" class="col-sm-2 col-form-label">Books Name</label>
            <input type="text" name="booksName" id="booksName" class="col-sm-8 form-control m-2" value="{{ $findBooks->booksName }}" required>
        </div>
        <div class="form-group row">
            <label for="booksImage" class="col-sm-2 col-form-label">Cover Image</label>
            <input type="file" name="booksImage" id="booksImage" class="col-sm-8 form-control-file m-2" value="{{ $findBooks->booksImage }}" required>
            <!-- <input type="image" src="{{ url('storage/images/') }}" alt="" class="col-sm-8 form-control m-2"> -->
        </div>
        <div class="form-group row">
            <label for="booksCategory" class="col-sm-2 col-form-label">Category</label>
            <select name="booksCategory" id="booksCategory" class="form-control m-2 col-sm-8"  required>
                <option value="{{ $findBooks->category->id }}"  selected hidden>{{ $findBooks->category->category }}</option>
                @foreach ($addBook as $ab) 
                <option value="{{ $ab->category->id }}">{{ $ab->category->category }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label for="booksAuthor" class="col-sm-2 col-form-label">Author</label>
            <select name="booksAuthor" id="booksAuthor" class="form-control m-2 col-sm-8"  required> 
                <option value="{{ $findBooks->author->id }}"  selected hidden>{{ $findBooks->author->author }}</option>
                @foreach ($addBook as $ab) 
                <option value="{{ $ab->author->id }}">{{ $ab->author->author }}</option>
                @endforeach
            </select>
        </div>

        <br>
        <input type="submit" value="SUBMIT" class="btn btn-success">

    </form>
</div>
@endsection