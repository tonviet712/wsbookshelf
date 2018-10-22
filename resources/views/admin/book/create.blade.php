@extends('layouts.admin.master')
@section('content')
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <h2 style="text-align: center;"><b>New Book</b></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form method="POST" action="/admin/books">
                @csrf
                <div class="form-group row">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="You Are Not So Smart" name="title" value="{{old('title')}}">
                    @if ($errors->has('title'))
                    <span class="errorMess" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail1">Author</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="DAVID MCRANEY" name="author" value="{{old('author')}}">
                    @if ($errors->has('author'))
                    <span class="errorMess" role="alert">
                        <strong>{{ $errors->first('author') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail1">Price (VND)</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="50000" name="price" value="{{old('price')}}">
                    @if ($errors->has('price'))
                    <span class="errorMess" role="alert">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail1">URL</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="https://bit.ly/2Dw6zYk" name="url" value="{{old('url')}}">
                    @if ($errors->has('url'))
                    <span class="errorMess" role="alert">
                        <strong>{{ $errors->first('url') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail1">Email User</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name@example.com" name="email" value="{{old('email')}}">
                    @if ($errors->has('email'))
                    <span class="errorMess" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail1">Status</label>
                    <select class="form-control col-sm-6" id="exampleFormControlSelect1" name="status">
                        <option selected="selected">Please select status</option>
                        {{-- <option value="0">Borrowed</option> --}}
                        <option value="1">Available</option>
                        <option value="2">Ordering</option>
                        <option value="3">Canceled</option>
                        <option value="4">Out of stock</option>
                    </select>
                    <div>
                        @if ($errors->has('status'))
                        <span class="errorMess" role="alert">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail1">Note</label>
                    <textarea class="form-control" name="note"></textarea>
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