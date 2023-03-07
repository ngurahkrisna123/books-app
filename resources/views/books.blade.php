<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books App</title>
</head>
<body>
    <style type="text/css">
		.pagination li{
			float: left;
            content: none !important;
			list-style-type: none;
			margin:5px;
		}
	</style>

    <div class="topnav">
        <a href="/">Books List</a> ||
        <a href="/topauthor">Top 10 Author</a> ||
        <a href="/rating">Ratings</a>
        
    </div>

    <h2>Books List</h2>

    <div >
        <form action="/showsearch" method="get">
            <label for="listshown">List shown : </label>
            <select name="show" id="listshown">
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
        
            <input type="text" name="search"  value="{{old('search')}}">
            <input type="submit" value="Submit">
        </form>
    </div>

    <br>

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    

    <div>
        <table border=1>
            <tr>
                <td>No</td>
                <td>Book Name</td>
                <td>Category Name</td>
                <td>Author Name</td>
                <td>Average Rating</td>
                <td>Voter</td>
            </tr>
            <?php $no = 1;?>
            
            @forelse($books as $key => $b)
            <tr>
                <td>{{ $books->firstItem() + $key }}</td>
                <td>{{ $b->booksName }}</td>
                <td>{{ $b->category->category }}</td>
                <td>{{ $b->author->author }}</td>
                <td>{{ round($b->rating_avg_rating,2) }}</td>
                <td>{{ $b->rating_count }}</td>    
            </tr>
            @empty
                <td><b>No Data</b></td>
            @endforelse

        </table>

        <br>
        Page : {{ $books->currentPage() }} <br/>
        Data : {{ $books->total() }} <br/>
        Data Per Page : {{ $books->perPage() }} <br/>

        {{ $books->withQueryString()->links() }}
    </div>
</body>
</html>