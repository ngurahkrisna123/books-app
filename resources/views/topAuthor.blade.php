@extends('mainview')
@section('content')
<div class="container">

    <h3>Top 10 Most Famous Author</h3>

    <br>

    <table class="table" border=1>
        <thead class="thead-dark">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Author Name</th>
                <th scope="col">Voter</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;?>
            @foreach($topAuthor as $t)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $t->author->author }}</td>
                <td>{{ $t->rating_count}}</td>
            </tr>
            @endforeach
        </tbody>
        

    </table>
    
</div>
@endsection