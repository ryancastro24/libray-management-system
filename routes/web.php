<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowedBooksController;
use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\ReturnedBook;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware('guest')->group(function () {
 
        Route::controller(AuthController::class)->group(function() {
            Route::get('login', 'login')->name('login');
            Route::post('login', 'loginAction')->name('login.action');
            Route::get('/', function () {
                return view('welcome');
            });
            
            
        });


});



// logout functinality
Route::get('logout', [AuthController::class, 'logout'])->name('logout');



// protect pages using auth 
Route::middleware('auth')->group(function() {

    // dashboard page
    Route::get('dashboard',function(){
        $data = Book::all();
        return view('dashboard',compact('data'));

    })->name('dashboard');

    // borrowedbooks page   
    Route::get('booksborrowed',function(){
        $userId = Auth::id();

        // Retrieve borrowed books for the current user
        $borrowedbooks = BorrowedBook::select([
                'borrowed_books.id as borrowed_book_id',
                'borrowed_books.is_returned',
                'borrowed_books.created_at',
                'borrowed_books.updated_at',
                'borrowed_books.user_id',
                'borrowed_books.book_id',
                'users.id as user_id',
                'users.name',
                'users.email',
                'users.idnumber',
                'users.role',
                'users.email_verified_at',
                'users.password',
                'users.remember_token',
                'books.id as book_id',
                'books.title',
                'books.author',
                'books.year_published',
                'books.is_available',
                'books.category'
            ])
            ->join('users', 'users.id', '=', 'borrowed_books.user_id')
            ->join('books', 'books.id', '=', 'borrowed_books.book_id')
            ->where('users.id', $userId) // Filter by the current user
            ->get();
        return view('booksborrowed',compact('borrowedbooks'));

    })->name('booksborrowed');





    // returnedbooks page
    Route::get('returnedbooks',function(){
        $userId = Auth::id(); //get the user loggin id
        $returnedbooks = ReturnedBook::select([
            'returned_books.id as returned_book_id',
            'returned_books.created_at',
            'returned_books.updated_at',
            'returned_books.user_id',
            'returned_books.book_id',
            'users.id as user_id',
            'users.name',
            'users.email',
            'users.idnumber',
            'users.role',
            'users.email_verified_at',
            'users.password',
            'users.remember_token',
            'books.id as book_id',
            'books.title',
            'books.author',
            'books.year_published',
            'books.is_available',
            'books.category'
        ])
        ->join('users', 'users.id', '=', 'returned_books.user_id')
        ->join('books', 'books.id', '=', 'returned_books.book_id')
        ->where('users.id', $userId) // Filter by the current user
        ->get();

        return view('returnedbooks',compact('returnedbooks'));

    })->name('returnedbooks');



    // sciencebooks page
    Route::get('sciencebooks',function(){
        $data = Book::where('category', 'science')->get();
        return view('category/sciencebooks',compact('data'));

    })->name('sciencebooks');



    // englishbooks page
    Route::get('englishbooks',function(){
        $data = Book::where('category', 'english')->get();
        return view('category/englishbooks',compact('data'));

    })->name('englishbooks');



    // mathematicsbooks page
    Route::get('mathematicsbooks',function(){
        $data = Book::where('category', 'mathematics')->get();
        return view('category/mathematicsbooks',compact('data'));

    })->name('mathematicsbooks');


    // transactions page
    Route::get('transactions',function(){
        $borrowedbooks = BorrowedBook::select([
            'borrowed_books.id as borrowed_book_id',
            'borrowed_books.is_returned',
            'borrowed_books.created_at',
            'borrowed_books.updated_at',
            'borrowed_books.user_id',
            'borrowed_books.book_id',
            'users.id as user_id',
            'users.name',
            'users.email',
            'users.idnumber',
            'users.role',
            'users.email_verified_at',
            'users.password',
            'users.remember_token',
            'books.id as book_id',
            'books.title',
            'books.author',
            'books.year_published',
            'books.is_available',
            'books.category'
        ])
        ->join('users', 'users.id', '=', 'borrowed_books.user_id')
        ->join('books', 'books.id', '=', 'borrowed_books.book_id')
        ->orderBy('borrowed_books.created_at', 'desc')
        ->get();
   
        return view('transactions',compact('borrowedbooks'));
    })->name('transactions');



    //usermanagement
    Route::get('usermanagement', function(){
        $data = User::all();
        return view('usermanagement',compact('data'));
    })->name('usermanagement');

    // add user
    Route::controller(AuthController::class)->group(function() {
        Route::post('register', 'registerSave')->name('register.save');
        Route::get('register/{id}', 'deleteUser')->name('user.remove');
        Route::get('userupdate','userupdate')->name('user.update');
        Route::post('userupdate','userupdateSave')->name('user.updateSave');
    });


    // borrowedbooks GroupController 
    Route::controller(BorrowedBooksController::class)->group(function() {
        Route::post('borrowedbooks', 'borrowedbooksSave')->name('borrowedbooks.save');
        Route::post('borrowedbooksreturn', 'borrowedbooksReturn')->name('borrowedbooks.return');
    });

    

    // book management 
    Route::controller(BooksController::class)->group(function() {
        Route::get('booksmanagement', 'books')->name('booksmanagement');
        Route::post('booksmanagement', 'saveBooks')->name('books.save');
        Route::get('booksdelete/{id}', 'delete')->name('books.delete');
        Route::get('updatebook','updatebook')->name('books.update');
        Route::post('updatebook','updatebookSave')->name('book.updateSave');
    });


});
