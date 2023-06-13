@extends('admin.layout')
@section('content')
    @include('sweetalert::alert')
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
                            <a href="{{ route('create.food') }}" style="    color: white;
 font-weight: 600;">Add
                                New</a></button>
                        <form action="{{ route('search') }}" method="get" class="form-inline ml-5"
                            style=" display: flex;float: right;">
                            @csrf
                            <input type="search" name="search" placeholder="search"
                                style="
                            text-align: center;
                            border-radius: 27px;
                            padding: 6px;
                            /* text-decoration: none; */
                        ">
                            <input type="submit" value="search" class="btn btn-outline-success">
                        </form>
                        <h4 class="mt-3" style="color: black;
">Foods


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

                                @foreach ($foods as $key => $food)
                                    <tr>

                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $food->heading }}</td>
                                        <td>{{ $food->discription }}</td>
                                        <td><img src="{{ asset('image/' . $food->image) }}" alt=""
                                                style="width: 30px;border-radius: 50px;"></td>
                                        <td>{{ $food->price }}</td>
                                        <td>
                                            <a href="{{ route('edit.food', $food->id) }}" class="btn btn-success"
                                                onClick="return confirm('Are you sure to edit this product ?')">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('delete.food', $food->id) }}" class="btn btn-danger"
                                                onClick="confirmation(event)">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach




                            </tbody>
                        </table>
                        @if (method_exists($foods, 'links'))
                            <div style="
    padding-left: 42%;
    margin-top: 55px;
    ">
                                {{ $foods->links() }}
                            </div>
                        @endif
                        {{-- {{ $foods->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
