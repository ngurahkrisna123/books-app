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
    
    <h2>Books List Picture</h2>

    <div class="row card-group">
        @forelse($books as $key => $b)
        <div class="column col-lg-3 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-img-block">
                    <img src="{{ url('storage/images/'.$b->booksImage) }}" alt="" srcset="" class="card-img-top">
                </div>
                <div class="card-title">
                    <h3>{{ $b->booksName }}</h3>
                </div>
                <div class="card-text">
                    <p>Category : {{ $b->category->category }}</p>
                    <p>Author : {{ $b->author->author }}</p>
                    <p>Rating : {{ round($b->rating_avg_rating,2) }} by {{ $b->rating_count }} voter</p>
                </div>
            </div>
        </div>
        @empty
        <div class="column" style="width:100%">
        <h4>No Data</h4>
        </div>
        @endforelse
    </div>

    Page : {{ $books->currentPage() }} <br/>
    Data : {{ $books->total() }} <br/>
    Data Per Page : {{ $books->perPage() }} <br/>
    
    {{ $books->withQueryString()->links() }}

</div>
@endsection