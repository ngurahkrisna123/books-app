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

    public function booksGallery()
    {
        $books = Books::withAvg('rating','rating')->withCount('rating')
                        ->orderBy('rating_avg_rating','desc')
                        ->orderBy('rating_count','desc')
                        ->Paginate(8);

        return view('booklist', ['books' => $books]);
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

        $insertRating = new Rating;

        $insertRating->rating = $r->input('rating');
        $insertRating->books_id = $r->input('selectBooks');
        $insertRating->save();

        return redirect('/')->with('status', 'Rating added!');
    }    

    public function addBooks(){
        $addBook = Books::all()->sortBy('booksName');

        return view('addbook',['addBook' => $addBook]);
    }

    public function insertBooks(Request $r){
        // $data = $r->all();
        
        $this->validate($r, [
            'booksImage' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $bookimage_name = $r->file('booksImage')->getClientOriginalName();

        $r->file('booksImage')->move(public_path('storage\images'), $bookimage_name);

        $insertBooks = new Books;

        $insertBooks->booksName = $r->input('booksName');
        $insertBooks->booksImage = $bookimage_name;
        $insertBooks->category_id = $r->input('booksCategory');
        $insertBooks->author_id = $r->input('booksAuthor');
        $insertBooks->save();

        return redirect('/')->with('status', 'New Book added!');
    }

    public function editBooks($id){
        $addBook = Books::all()->sortBy('booksName');
        $findBooks = Books::find($id);

        return view('editbook', compact('findBooks'),['addBook' => $addBook]);
    }

    public function updateBooks($id, Request $r){
        $updateBooks = Books::find($id);

        $updateBooks->booksName = $r->input('booksName');
        
        $bookimage_name = $r->file('booksImage')->getClientOriginalName();
        $r->file('booksImage')->move(public_path('storage\images'), $bookimage_name);

        $updateBooks->booksImage = $bookimage_name;
        $updateBooks->category_id = $r->input('booksCategory');
        $updateBooks->author_id = $r->input('booksAuthor');
        $updateBooks->save();

        return redirect('/')->with('status','Book edited!');

    }

    public function deleteBooks($id){
        $deleteBooks = Books::find($id);

        $deleteBooks->delete();

        return redirect('/')->with('status', 'Book deleted!');
    }
    
    // public function ratingss(Request $request)
    // {
    //     $selectBook = Books::where('author_id',$request->authorId)->pluck('id','booksName');
    //     return response()->json($selectBook);
    // }
}
?>