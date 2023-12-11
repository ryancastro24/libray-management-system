<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use PDO;

class BooksController extends Controller
{


    public function books(){
        $data = Book::all();
        return view('booksmanagement',compact('data'));
    }
    
   public function saveBooks(Request $request){
        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'year_published' => $request->year_published,
            'category'  => $request->category 
        ];

         Book::create($data);

        return redirect()->route('booksmanagement');
   }

   public function delete($id){
     $book = Book::find($id);

    // Check if the book exists
    if($book){
        // Delete the book
        $book->delete();
        // Redirect to a page or return a response
        return redirect()->route('booksmanagement');
        // Redirect to a page or return a response for non-existing book
        return redirect()->route('booksmanagement');
    }
   }


   public function booksUpdate(){
    
   }
}
