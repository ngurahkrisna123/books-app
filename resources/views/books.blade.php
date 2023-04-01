@extends('mainview')
@section('content')
<div class="container">
    <style type="text/css">
		.pagination li{
			float: left;
            content: none !important;
			list-style-type: none;
			margin:5px;
		}
	</style>

    <h2>Books List</h2>
    <div class="d-flex">
        <div class="flex-grow-1">
            <form action="/showsearch" method="get" class="form-inline">
                <label for="listshown">List shown : </label>
                <select name="show" id="listshown" class="form-control m-2">
                    <option value=10> 10 </option>
                    <option value=20> 20 </option>
                    <option value=30> 30 </option>
                    <option value=40> 40 </option>
                    <option value=50> 50 </option>
                    <option value=60> 60 </option>
                    <option value=70> 70 </option>
                    <option value=80> 80 </option>
                    <option value=90> 90 </option>
                    <option value=100> 100 </option>
                </select>
            
                <label for="search">Search     : </label>
            
                <input type="text" name="search"  value="{{old('search')}}" class="form-control m-2">
                <input type="submit" value="Submit" class="btn btn-primary">

            </form>
        </div>
        <div>
        <a href="/addbook" class="btn btn-success justify-content-end m-2">Add Book</a>
        </div>
    </div>

    <br>

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    

    <div>
        <table class="table" border=1>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Author Name</th>
                    <th scope="col">Average Rating</th>
                    <th scope="col">Voter</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;?>
                
                @forelse($books as $key => $b)
                <tr>
                    <th scope="row">{{ $books->firstItem() + $key }}</th>
                    <td>{{ $b->booksName }}</td>
                    <td>{{ $b->category->category }}</td>
                    <td>{{ $b->author->author }}</td>
                    <td>{{ round($b->rating_avg_rating,2) }}</td>
                    <td>{{ $b->rating_count }}</td>    
                    <td>
                        <div class="d-flex">
                            <a href="/editbook/{{ $b->id }}" class="btn btn-info mr-2">Edit</a>
                            <a href="/deletebook/{{ $b->id }}" class="btn btn-danger">Delete</a>
                        </div>
                    </td>
                </tr>
                @empty
                    <td><b>No Data</b></td>
                @endforelse
            </tbody>
        </table>

        <br>
        Page : {{ $books->currentPage() }} <br/>
        Data : {{ $books->total() }} <br/>
        Data Per Page : {{ $books->perPage() }} <br/>

        {{ $books->withQueryString()->links() }}
    </div>
</div>
@endsection