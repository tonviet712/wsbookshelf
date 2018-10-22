@extends('layouts.user.master')
@section('content')
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <h2 style="text-align: center;"><b>Registration</b></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form method="POST" action="/admin/books/{{$book->id}}">
                @csrf
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
                    <label for="exampleInputEmail1">Status</label>
                    <select class="form-control col-sm-6" id="status" name="status">
                        <option {{ (old('status')=='0' || $book->status == '0') ? "selected":""}} value="0" data-status="0">Borrowed</option>
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
                <div class="text-center">
                    <button type="submit" class="mgBtn btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection