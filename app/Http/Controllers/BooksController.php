<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Books;
use App\Models\Author;
use App\Models\Category;
use App\Models\Rating;



class BooksController extends Controller
{
    //
    public function index()
    {
        $books = Books::withAvg('rating','rating')->withCount('rating')
                        ->orderBy('rating_avg_rating','desc')
                        ->orderBy('rating_count','desc')
                        ->Paginate(10);

        return view('books', ['books' => $books]);
    }

    public function showsearch(Request $request)
    {
        $show = $request->show;
        $search = $request->search;

        $books = Books::where('booksName','like',"%".$search."%")
                        ->withAvg('rating','rating')->withCount('rating')
                        ->orderBy('rating_avg_rating','desc')
                        ->orderBy('rating_count','desc')
                        ->Paginate($show);

        return view('books', ['books' => $books]);
    }

    public function topAuthor()
    {
        $topAuthor = Books::has('rating','>','5')
                            ->withCount('rating')
                            ->orderBy('rating_count','desc')
                            ->Paginate(10);

        return view('topAuthor',[ 'topAuthor' => $topAuthor]);   
    }

    public function rating()
    {
        $selectBook = Books::all()->sortBy('booksName');

        return view('ratings', ['selectBook' => $selectBook]);
    }



    public function insertRating(Request $r){
        $data = $r->all();

        $modelRating = new Rating;

        $modelRating->rating = $r->input('rating');
        $modelRating->books_id = $r->input('selectBooks');
        $modelRating->save();

        return redirect('/')->with('status', 'Rating added!');
    }    
    
    // public function ratingss(Request $request)
    // {
    //     $selectBook = Books::where('author_id',$request->authorId)->pluck('id','booksName');
    //     return response()->json($selectBook);
    // }
}
?>