@extends('layouts.admin.master')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6" style="margin-top: 25%;">
        <h1 style="text-shadow: -1px -1px 0px rgba(255,255,255,0.3), 1px 1px 0px rgba(0,0,0,0.8);
                color: #FF7400;
                /*opacity: 0.8;*/
                font: 200 80px 'Bitter';">Hi, {{ Auth::user()->name }}!!!</h1>
    </div>
</div>
@endsection

