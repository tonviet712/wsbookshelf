<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Book;
use App\User;
use App\History;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function __construct()
    {
        $this->listStatus = [
            'Borrowed', 'Available', 'Ordering', 'Canceled', 'Out Of Stock'
        ];
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $bookList = Book::filter($request)->orderBy('title','asc');
        $bookList = $bookList->paginate(15);
        return view('admin.book.index', ['bookList' => $bookList,'listStatus' => $this->listStatus]);
    }

    public function create()
    {
        return view('admin.book.create');
    }

    public function store(BookRequest $request)
    {
        $book = new Book;
        $book->title    = $request->title;
        $book->author   = $request->author;
        $book->price    = $request->price;
        $book->url      = $request->url;
        $book->user_id  = User::withTrashed()
        ->where('email', $request->email)
        ->first()
        ->id;
        $book->status   = $request->status;
        $book->url      = $request->url;
        $book->note     = $request->note;
        $book->save();
        return redirect()->route('admin.books.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $book = Book::find($id);
        if (!$book) return abort(404);
        return view('admin.book.edit', ['book' => $book, 'listStatus' => $this->listStatus]);
    }

    public function update(BookRequest $request, $id)
    {
        $book = new Book;
        $book->UpdateBook($id, $request);
        /*if (!$request->input('status') == 0) {
            $book->update($request->all());
        } else {
            // If changes status to BORROWED
            $validatedData = $request->validate([
                'email2' => 'required|email|exists:users,email',
                'borrowed_at' => 'required|date:Y-m-d',
                'returned_at' => 'required|date:Y-m-d'
            ]);
            $book->update($request->all());
            $book_id = History::where('book_id', $book->id);
            $borrower_id = User::where('email',$request->input('email2'))->first()->id;
            if ($book_id && $borrower_id) {
                $book->userHistory()->updateExistingPivot(
                    User::where('email',$request->input('email2'))->first()->id,
                    ['borrowed_at' => $request->input('borrowed_at'),
                    'returned_at' => $request->input('returned_at')]
                );
            } else {
                $book->userHistory()->attach(
                    User::where('email',$request->input('email2'))->first()->id,
                    ['borrowed_at' => $request->input('borrowed_at'), 'returned_at' => $request->input('returned_at')]
                );
            }
        }*/

        return redirect()->route('admin.books.index');
    }

    public function destroy($id)
    {
        $book = Book::find($id)->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
}
