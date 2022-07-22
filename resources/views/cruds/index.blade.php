    @extends('layouts.layout-client')
    @section('content')
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Laravel 8 CRUD</h2>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('cruds.create') }}"> Create CRUD</a>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($cruds as $key => $crud)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $crud->name }}</td>
                        <td>{{ $crud->email }}</td>
                        <td>{{ $crud->address }}</td>
                        <td>
                            <form action="{{ route('cruds.destroy', $crud->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('cruds.edit', $crud->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{-- {{ $cruds->links() }} --}}
            @include('block.panigation')
        </div>
    @endsection
