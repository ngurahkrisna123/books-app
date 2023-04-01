@extends('mainview')
@section('content')
<div class="container">

    <h3>Insert Rating</h3>

    <form action="/insertrating" method="POST" enctype="multipart/form-data" class="form-group">
        {{ csrf_field() }}
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="selectAuthor">Book Author</label>
            <select name="selectAuthor" id="slctAuthor" class="form-control m-2 col-sm-6">
                <option value="" disabled selected hidden>--Select Author--</option>
                @foreach ($selectBook as $sb) 
                <option value="{{ $sb->author->author }}">{{ $sb->author->author }}</option>
                @endforeach

            </select>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="selectBooks">Book Name</label>
            <select name="selectBooks" id="slctBooks" required="" class="form-control m-2 col-sm-6">
                <option value="" disabled selected hidden>--Select Book--</option>
                @foreach ($selectBook as $sb) 
                <option value="{{ $sb->id }}">{{ $sb->booksName }}</option>
                @endforeach

            </select>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="rating">Rating</label>
            <select name="rating" id="rating" class="form-control m-2 col-sm-6">
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
        </div>
    
        <input type="submit" value="SUBMIT" class="btn btn-primary">
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
    
</div>
@endsection