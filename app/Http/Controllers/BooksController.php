<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

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
     $book = Book::findOrFail($id);

    // Check if the book exists
    if($book){
        $book->delete();
        // Redirect to a page or return a response
        return redirect()->route('booksmanagement');
        // Redirect to a page or return a response for non-existing book
        return redirect()->route('booksmanagement');
    }
   }


   public function updatebook(Request $request)
    {
        // Retrieve the 'id' parameter from the request
        $id = $request->input('id');

        // Use $id as needed

        $data =  Book::find($id);

        return view('update-books',compact('data') );
    }


    public function  updatebookSave(Request $request){
        $book = Book::find($request->id);
        $data = [
            'title' => $request->update_title,
            'author' => $request->update_author,
            'year_published' => $request->update_year_published,
            'category' => $request->update_category,
        ];

        $book->update($data);

        return redirect()->route('booksmanagement');
    }
}
