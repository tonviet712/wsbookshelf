<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Book;
use Auth;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('member');
    }

    public function borrow($id)
    {
        $book = Book::find($id);
        return view('user.borrow', compact('book'));
    }
}
