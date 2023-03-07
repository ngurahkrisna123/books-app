<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Author</title>
</head>
<body>
    <div class="topnav">
        <a href="/">Books List</a> ||
        <a href="/topauthor">Top 10 Author</a> ||
        <a href="/rating">Ratings</a>
        
    </div>

    <h3>Top 10 Most Famous Author</h3>

    <br>

    <table border=1>
        <tr>
            <td>No.</td>
            <td>Author Name</td>
            <td>Voter</td>
        </tr>
        <?php $no=1;?>
        @foreach($topAuthor as $t)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $t->author->author }}</td>
            <td>{{ $t->rating_count}}</td>
        </tr>
        @endforeach

    </table>
    
</body>
</html>