<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\History;
use App\Http\Requests\BookRequest;

class Book extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    public $listStatus = [
        'Borrowed', 'Available', 'Ordering', 'Canceled', 'Out Of Stock'
    ];
    protected $fillable = [
        'title', 'author', 'price', 'url', 'user_id', 'status', 'note'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function userHistory()
    {
        return $this->belongsToMany('App\User', 'borrowing_history', 'book_id', 'user_id')->withPivot('borrowed_at', 'returned_at');
    }

    public function scopeFilter($query, $request)
    {
        if ($request->has('status')) {
            $status = $request->input('status');
            if (isset($this->listStatus[$status])) {
                $query->where('status', $status);
            }
        }
        if($request->has('q')) {
            $query->where(function ($query) use ($request) {
                $query->where('title', 'like', '%'.$request->input('q').'%')
                      ->orWhere('author', 'like', '%'.$request->input('q').'%');
            });
        }
    }

    public function UpdateBook($id, $request)
    {
        $book = Book::find($id);
        $book->update($request->all());
        // If status changes to BORROWED
        if ($request->input('status') == 0) {
            $validatedData = $request->validate([
                'email2' => 'required|email|exists:users,email',
                'borrowed_at' => 'required|date:Y-m-d',
                'returned_at' => 'required|date:Y-m-d'
            ]);
            // Get book_id & user_id
            $bookHistory    = History::where('book_id', $id);
            $borrowerId     = User::where('email',$request->input('email2'))->first()->id;
            $parameter      = [
                'borrowed_at'   => $request->input('borrowed_at'),
                'returned_at'   => $request->input('returned_at'),
                'created_at'    => $request->input('created_at'),
                'updated_at'    => $request->input('updated_at')
            ];
            // Check if update or attach new record
            if (isset($bookHistory->user_id) && $borrowerId == $bookHistory->user_id) {
                $book->userHistory()->updateExistingPivot($borrowerId, $parameter);
            } else {
                $book->userHistory()->attach($borrowerId, $parameter);
            }
        }
    }
}