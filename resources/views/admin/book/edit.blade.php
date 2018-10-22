@extends('layouts.admin.master')
@section('content')
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <h2 style="text-align: center;"><b>Edit Book</b></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form method="POST" action="/admin/books/{{$book->id}}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" value="{{$book->title}}">
                    @if ($errors->has('title'))
                    <span class="errorMess" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail1">Author</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="author" value="{{$book->author}}">
                    @if ($errors->has('author'))
                    <span class="errorMess" role="alert">
                        <strong>{{ $errors->first('author') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail1">Price (VND)</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="price" value="{{($book->price)}}">
                    @if ($errors->has('price'))
                    <span class="errorMess" role="alert">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail1">URL</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="url" value="{{$book->url}}">
                    @if ($errors->has('url'))
                    <span class="errorMess" role="alert">
                        <strong>{{ $errors->first('url') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail1">Email Orderer</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{$book->user->email}}">
                    @if ($errors->has('email'))
                    <span class="errorMess" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail1">Status</label>
                    <select class="form-control col-sm-6" id="status" name="status">
                        <option>Please select status</option>
                        <option {{ (old('status')=='0' || $book->status == '0') ? "selected":""}} value="0" data-status="0">Borrowed</option>
                        <option {{ (old('status')=='1') ? "selected":""}} value="1" data-status="1">Available</option>
                        <option {{ (old('status')=='2') ? "selected":""}} value="2" data-status="2">Ordering</option>
                        <option {{ (old('status')=='3') ? "selected":""}} value="3" data-status="3">Canceled</option>
                        <option {{ (old('status')=='4') ? "selected":""}} value="4" data-status="4">Out of stock</option>
                    </select>
                    <div>
                        @if ($errors->has('status'))
                        <span class="errorMess" role="alert">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                {{-- Check if change status to BORROWED ==> add 2 more field --}}
                <div class="form-group row history" style="display: none;">
                    <label for="exampleInputEmail1">Email Borrower</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email2" value="{{old('email2')}}">
                    @if ($errors->has('email2'))
                    <span class="errorMess" role="alert">
                        <strong>{{ $errors->first('email2') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group row history" style="display: none;">
                    <label for="exampleInputEmail1">Borrowing Date</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="yyyy-mm-dd" name="borrowed_at" value="{{old('borrowed_at')}}">
                    @if ($errors->has('borrowed_at'))
                    <span class="errorMess" role="alert">
                        <strong>{{ $errors->first('borrowed_at') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group row history" style="display: none;">
                    <label for="exampleInputEmail1">Returning Date</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="yyyy-mm-dd" name="returned_at" value="{{old('returned_at')}}">
                    @if ($errors->has('returned_at'))
                    <span class="errorMess" role="alert">
                        <strong>{{ $errors->first('returned_at') }}</strong>
                    </span>
                    @endif
                </div>
                {{-- end field --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1">Note</label>
                    <textarea class="form-control" name="note" value="{{$book->note}}"></textarea>
                    @if ($errors->has('note'))
                    <span class="errorMess" role="alert">
                        <strong>{{ $errors->first('note') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="text-center">
                    <button type="submit" class="mgBtn btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection