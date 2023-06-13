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
                        <form action="{{ route('search') }}" method="GET" class="form-inline ml-5 text-dark"
                            style="    float: right;">
                            @csrf
                            <input type="search" class="" name="search" placeholder="search">
                            <input type="submit" value="Search" class="btn btn-outline-success">
                        </form>
                        <button class="btn btn-info">
                            <a href="{{ route('create.breakfast') }}" style="    color: white;
 font-weight: 600;">Add
                                New</a></button>
                        <h4 class="mt-3" style="color: black;
">Breakfast


                        </h4>
                    </div>
                    <div class="card-body text-dark">
                        <table class="table text-dark">
                            <thead>
                                <tr>


                                    <th>S.No</th>
                                    <th>Heading</th>
                                    <th>Discription</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($breakfasts as $key => $breakfast)
                                    <tr>

                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $breakfast->heading }}</td>
                                        <td>{{ $breakfast->discription }}</td>
                                        <td><img src="{{ asset('image/' . $breakfast->image) }}" alt=""
                                                style="width: 30px;border-radius: 50px;"></td>
                                        <td>{{ $breakfast->price }}</td>
                                        <td>
                                            <a href="{{ route('edit.breakfast', $breakfast->id) }}" class="btn btn-success"
                                                onClick="return confirm('Are you sure to edit this product ?')">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('delete.breakfast', $breakfast->id) }}" class="btn btn-danger"
                                                onClick="showit()">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach




                            </tbody>
                        </table>
                        @if (method_exists($breakfasts, 'links'))
                            <div style="margin-top: 5%; padding-left: 13%; ">
                                {{ $breakfasts->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
