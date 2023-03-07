<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js" type="text/javascript"></script>

</head>
<body>
    <div class="topnav">
        <a href="/">Books List</a> ||
        <a href="/topauthor">Top 10 Author</a> ||
        <a href="/rating">Ratings</a>
        
    </div>

    <h3>Insert Rating</h3>

    <form action="/insertrating" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label for="selectAuthor">Book Author : </label>
        <select name="selectAuthor" id="slctAuthor" >
            <option value="" disabled selected hidden>--Select Author--</option>
            @foreach ($selectBook as $sb) 
            <option value="{{ $sb->author->author }}">{{ $sb->author->author }}</option>
            @endforeach

        </select>
        <br>

        <label for="selectBooks">Book Name  : </label>
        <select name="selectBooks" id="slctBooks" required="">
            <option value="" disabled selected hidden>--Select Book--</option>
            @foreach ($selectBook as $sb) 
            <option value="{{ $sb->id }}">{{ $sb->booksName }}</option>
            @endforeach

        </select>
        <br>

        <label for="rating">Rating      : </label>
        <select name="rating" id="rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <br>

        <input type="submit" value="SUBMIT">
    </form>

    
    <script type="text/javascript">
        // $(document).ready(function(){
        //     $("#slctAuthor").change(function () {
        //         var authorId = $(this).val();
        //         if (authorId) {
        //             $.ajax({
        //                 type:"GET",
        //                 url:"/books/ratingss?authorId="+authorId,
        //                 dataType:'JSON',
        //                 success: function (result) {
        //                     if (result) {
        //                         $("#slctBooks").empty();
        //                         $(result).each(function(id,booksName){
        //                             $("#slctBooks").append('<option value = "'+ id +'" > '+ booksName  +' </option>');
        //                             $('#slctBooks').append($('<option>', {value: id,text: booksName}));                        
        //                         });
        //                     }
        //                 }
        //             })
        //         }
        //     });
        // });

    </script>   
    
</body>
</html>