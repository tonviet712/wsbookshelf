@extends('layouts.user.master')
@section('content')
<div class="row">
    <div class="col-sm-10" style="margin-top: 5%; text-align: center;">
        <form action="#" method="get">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search what you want">
                <span class="input-group-btn">
                    <button type="submit" id="search-btn" class="btn btn-primary"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>
{{-- <div class="row">
    <div class="col-sm-10">
        <h1 style="text-shadow: -1px -1px 0px rgba(255,255,255,0.3), 1px 1px 0px rgba(0,0,0,0.8);
        color: #FF7400;
        opacity: 0.7;
        font: 200 60px 'Bitter';
        font-family: Courier New;
        text-align: center;
        font-style: italic;">search the book you want</h1>
    </div>
</div> --}}
@if (isset($bookList))
<table class="table table-bordered">
    <thead>
        <tr class="row">
            <th class="col-sm-3 text-center">Title</th>
            <th class="col-sm-2 text-center">Author</th>
            <th class="col-sm-1 text-center">Price (VND)</th>
            <th class="col-sm-2 text-center">Borrower</th>
            <th class="col-sm-1 text-center">Status</th>
            <th class="col-sm-2 text-center">Note</th>
            <th class="col-sm-1 text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bookList as $value)
        <?php
            $borrower = null;
            if ($value->status == 0) {
                $borrower = $value->userHistory()->withTrashed()->orderBy('borrowed_at','DESC')->first();
                $borrower = $borrower['name'];
            }
        ?>
        <tr class="row">
            <td class="col-sm-3"> <b>{{ ucwords($value->title) }}</b> </td>
            <td class="col-sm-2"> {{ mb_strtoupper($value->author) }} </td>
            <td class="col-sm-1"> {{ number_format($value->price) }} </td>
            <td class="col-sm-2">{{ $borrower}} </td>
            <td class="col-sm-1"> {{$listStatus[$value->status] }} </td>
            <td class="col-sm-2"> {{$value->note}} </td>
            @if ($value->status == 1) <td class="col-sm-1 text-center"><a href="/register/"><i class="fa fa-3x fa-plus-circle"></i></a></td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row col-sm-10 text-center">
        {{ $bookList->links() }}
    </div>
@endif
@endsection

