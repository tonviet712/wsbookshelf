  @extends('layouts.admin.master')
  @section('content')
  <div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-8">
                <h2><b>History Details</b></h2>
            </div>
            {{-- <div class="col-sm-4">
                <a href="/admin/books/create">
                    <h2>
                        <button type="button" class="btn btn-info add-new">
                            <i class="fa fa-plus"></i>
                            Add New
                        </button>
                    </h2>
                </a>
            </div> --}}
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr class="row">
                <th class="col-sm-1 text-center">ID</th>
                <th class="col-sm-3 text-center">Book Title</th>
                <th class="col-sm-3 text-center">Borrower</th>
                <th class="col-sm-2 text-center">Borrowing Date</th>
                <th class="col-sm-2 text-center">Returning Date</th>
                <th class="col-sm-1 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($history as $value)
            <tr class="row">
                <td class="col-sm-1">{{ $value->id }}</td>
                <td class="col-sm-3"> {{ \App\Book::where('id',$value->book_id)->withTrashed()->first()->title }} </td>
                <td class="col-sm-3"> {{ \App\User::where('id',$value->user_id)->withTrashed()->first()->name }} </td>
                <td class="col-sm-2"> {{ date("F jS, Y", strtotime($value->borrowed_at)) }} </td>
                <td class="col-sm-2"> {{ date("F jS, Y", strtotime($value->returned_at)) }} </td>
                <td class="col-sm-1">
                    <a class="btn btn-warning" href="/admin/books/{{$value->book_id}}/edit" data-toggle="tooltip" data-original-title="Edit" style="width: 48%;"><i class="fa fa-edit"></i></a>
                   {{--  <a class="btn btn-danger deleteBook" data-id = "{{ $value->id }}" data-token="{{ csrf_token() }}" style="width: 48%;"><i class="fa fa-trash"> </i></a> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row col-sm-10 text-center">
        {{ $history->links() }}
    </div>
</div>

@endsection