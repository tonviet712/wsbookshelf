<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Book;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function listAdmin()
    {
        $data = User::where('role', 1)->orderBy('name')->get() ;
        return view('admin.user.list', compact('data'))->with('role' , 'Admin');
    }

    public function listUser()
    {
        $data = User::where('role', 0)->orderBy('name')->get();
        return view('admin.user.list', compact('data'))->with('role' , 'User');
    }

    public function listBook()
    {
        $bookList = Book::all();
        return view('admin.book.list', compact('bookList'));
    }
}
