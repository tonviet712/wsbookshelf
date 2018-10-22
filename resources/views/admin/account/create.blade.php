@extends('layouts.admin.master')
@section('content')
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <h2 style="text-align: center;"><b>New Account</b></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form method="POST" action="/admin/accounts">
                @csrf
                <div class="form-group row">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" name="name">
                    @if ($errors->has('name'))
                    <span class="errorMess" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                    @if ($errors->has('email'))
                    <span class="errorMess" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword1">Role</label>
                    <select class="form-control col-sm-6" id="exampleFormControlSelect1" name="role">
                        <option selected="selected" value="0">User</option>
                        <option value="1" disabled="">Admin</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="mgBtn btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection