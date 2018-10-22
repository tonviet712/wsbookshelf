<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Book;
use Auth;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('member');
    }

    public function index(Request $request)
    {
        $bookList = new Book;
        $listStatus = $bookList->listStatus;
        $bookList   = $bookList::filter($request)->orderBy('title','asc');
        $bookList   = $bookList->paginate(15);
        return view('user.index', ['bookList' => $bookList, 'listStatus' => $listStatus]);
    }
}
