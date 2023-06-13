@extends('admin.layout')
@section('content')
    <div class="container" style="margin-left: 17%;padding: 25px;">
        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="submit" class="close" data-dismiss="alert"></button>
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-info">
                            <a href="{{ route('create.chef') }}" style="color: white;
 font-weight: 600;">Add
                                New</a></button>
                        <h4 class="mt-3" style="color: black;
">Chefs</h4>
                    </div>

                    <div class="card-body text-dark">
                        <table class="table text-dark">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Speciality</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($chefs as $key => $chef)
                                    <tr>

                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $chef->name }}</td>
                                        <td>{{ $chef->speciality }}</td>
                                        <td><img src="{{ asset('image/' . $chef->image) }}" alt=""
                                                style="width: 30px;border-radius: 50px;"></td>
                                        <td>
                                            <a href="{{ route('edit.chef', $chef->id) }}" class="btn btn-success"
                                                onClick="return confirm('Are you sure to edit this product ?')">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('delete.chef', $chef->id) }}" class="btn btn-danger"
                                                onClick="showit()">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach




                            </tbody>
                        </table>
                        {{ $chefs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
