  @extends('layouts.master')
  @section('content')
  <div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-8">
                <h2><b>Book Details</b></h2>
            </div>
            <div class="col-sm-4">
                <h2>
                    <button type="button" class="btn btn-info add-new">
                        <i class="fa fa-plus"></i>
                        Add New
                    </button>
                </h2>

            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>URL</th>
                <th>Orderer</th>
                <th>Status</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookList as $book)
            <tr>
                <td>{{$book->title}}</td>
                <td> {{$book->author}} </td>
                <td> {{$book->price}} </td>
                <td> {{$book->url}} </td>
                <td> {{$book->orderer}} </td>
                <td> {{$book->status}} </td>
                <td> {{$book->note}} </td>
                <td>
                    <a class="btn btn-warning" title="" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger" title="" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash"> </i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection