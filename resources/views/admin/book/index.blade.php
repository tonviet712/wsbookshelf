@extends('layouts.admin.master')
@section('content')
<section class="content-header row">
    <div class="col-xs-8">
        <form action="" method="get">
            <div class="input-group">
                <input name="status" value="{{(isset($_GET['status'])) ? $_GET['status'] : ""}}" type="hidden">
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
            <div class="col-sm-8">
                <h2><b>Book Details</b></h2>
            </div>
            <div class="col-sm-4">
                <a href="/admin/books/create">
                    <h2>
                        <button type="button" class="btn btn-info add-new">
                            <i class="fa fa-plus"></i>
                            Add New
                        </button>
                    </h2>
                </a>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr class="row">
                <th class="col-sm-2 text-center">Title</th>
                <th class="col-sm-2 text-center">Author</th>
                <th class="col-sm-1 text-center">Price (VND)</th>
                <th class="col-sm-1 text-center">URL</th>
                <th class="col-sm-2 text-center">Orderer</th>
                <th class="text-center">Status</th>
                <th class="text-center">Note</th>
                <th class="col-sm-2 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookList as $value)
            <tr class="row">
                <td class="col-sm-2"> <b>{{ ucwords($value->title) }}</b> </td>
                <td class="col-sm-2"> {{ mb_strtoupper($value->author) }} </td>
                <td class="col-sm-1"> {{ number_format($value->price) }} </td>
                <td class="col-sm-2" style="word-break: break-all;"> <i>{{$value->url}}</i> </td>
                <td class="col-sm-2"> {{ $value->user()->withTrashed()->first()->name }} </td>
                <td class="col-sm-1"> {{$listStatus[$value->status] }} </td>
                <td class="col-sm-1"> {{$value->note}} </td>
                <td class="col-sm-1">
                    <a class="btn btn-warning" href="/admin/books/{{$value->id}}/edit" data-toggle="tooltip" data-original-title="Edit" style="width: 48%;"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger deleteBook" data-id = "{{ $value->id }}" data-token="{{ csrf_token() }}" style="width: 48%;"><i class="fa fa-trash"> </i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row col-sm-10 text-center">
        {{ $bookList->links() }}
    </div>
</div>

@endsection