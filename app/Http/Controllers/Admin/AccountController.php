<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use Illuminate\Support\MessageBag;
use App\User;
use Auth;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $accountList = User::filter($request)->orderBy('name','asc')->where('id', '!=', Auth::id())->paginate(10);
        return view('admin.account.index', compact('accountList'));
    }

    public function create()
    {
        return view('admin.account.create');
    }

    public function store(AccountRequest $request)
    {
        User::create($request->all());
        return redirect()->route('admin.accounts.index');
    }

    public function edit($id)
    {
        $account = User::find($id);
        if (!$account) return abort(404);
        return view('admin.account.edit', compact('account'));
    }

    public function update(AccountRequest $request, $id)
    {
        $account = User::find($id);
        $account->update($request->all());
        return redirect()->route('admin.accounts.index');
    }

    public function destroy($id)
    {
        $account = User::find($id)->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
}
