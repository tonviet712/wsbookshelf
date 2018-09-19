  @extends('layouts.master')
  @section('content')
  <div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-8">
                <h2><b>{{$role}} Details</b></h2>
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
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $admin)
            <tr>
                <td>{{$admin->name}}</td>
                <td> {{$admin->email}} </td>
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