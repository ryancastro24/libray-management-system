<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\ReturnedBook;
use Illuminate\Http\Request;

class BorrowedBooksController extends Controller
{
    //
    public function borrowedbooksSave(Request $request){
        $borrowedbook = [
            'user_id' =>  $request->user_id,
            'book_id' => $request->book_id
        ];

        BorrowedBook::create($borrowedbook);

        Book::where('id', $request->book_id)->update(['is_available' => false]);

        return redirect()->route('dashboard');

    }


    public function borrowedbooksReturn(Request $request){

        Book::where('id', $request->borrowedbook_book_id)->update(['is_available' => true]);
        BorrowedBook::where('id', $request->borrowedbook_id)->update(['is_returned' => true]);

        $returnedBook =[
            "user_id" => $request->borrowedbook_user_id,
            "book_id" => $request->borrowedbook_book_id,
        ];
        ReturnedBook::create($returnedBook);


        return redirect()->route('transactions');
    }

}
