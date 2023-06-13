@extends('admin.layout')
@section('content')
    @include('sweetalert::alert')
    <div class="container" style="margin-left: 17%;padding: 25px;">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="submit" class="close" data-dismiss="alert">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 style="
    color: black;
">Users

                        </h4>
                    </div>
                    <div class="card-body text-dark">
                        <table class="table text-dark">
                            <thead>
                                <tr>


                                    <th>S No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $key => $data)
                                    <tr>

                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        @if ($data->usertype == '0')
                                            <td>
                                                <a href="{{ route('delete.user', $data->id) }}" class="btn btn-danger"
                                                    onClick="confirmation(event)">Delete</a>
                                            </td>
                                        @else
                                            <td>
                                                <button class="btn btn-success">Not Allowed</button>

                                            </td>
                                        @endif
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
