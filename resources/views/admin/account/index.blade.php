@extends('layouts.admin.master')
@section('content')
<section class="content-header row">
    <div class="col-xs-8">
        <form action="?q=" method="get">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search">
                <span class="input-group-btn">
                    <button type="submit" id="search-btn" class="btn btn-primary"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
    </div>
</section>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-9">
                <h2><b>Account List</b></h2>
            </div>
            <div class="col-sm-3">
                <a href="/admin/accounts/create">
                    <h2>
                        <button type="button" class="btn btn-info add-new">
                            <i class="fa fa-plus"></i>
                            Add Account
                        </button>
                    </h2>
                </a>

            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th class="col-sm-2 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accountList as $value)
            <tr>
                <td>{{$value->name}}</td>
                <td> {{$value->email}} </td>
                <td>{{($value->role == 1) ? "Admin" : "User"}}</td>
                <td class="row text-center">
                    <div class="col-sm-3">
                        <a href="/admin/accounts/{{$value->id}}/edit" class="btn btn-warning fa fa-edit" title="" data-toggle="tooltip" data-original-title="Edit"></a>
                    </div>
                    <div class="col-sm-3">
                        {{-- <form method="POST" action="{{route('admin.accounts.destroy', $value->id)}}">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button class="btn-danger">
                                <a onclick="return confirm('Are you sure?')" class="btn btn-danger fa fa-trash" title="" data-toggle="tooltip" data-original-title="Delete" type="submit">
                                </a>
                            </button>
                        </form> --}}

                        <a class="btn btn-danger fa fa-trash deleteAccount" data-id = "{{ $value->id }}" data-token="{{ csrf_token() }}"></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-xs-9 text-center">
        {{ $accountList->links() }}
    </div>
</div>

@endsection