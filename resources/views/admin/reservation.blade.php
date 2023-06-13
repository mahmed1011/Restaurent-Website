@extends('admin.layout')
@section('content')
    @include('sweetalert::alert')

    <div class="container" style="    margin-left: 17%;    padding: 25px;">
        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="submit" class="close" data-dismiss="alert">x</button>
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="col-md-12">
            <div class="row">
                <div class="card">
                    <div class="card-header">

                        <h4 class="mt-3" style="color: black;
">Reservation Tables


                        </h4>
                    </div>
                    <div class="card-body text-dark">
                        <table class="table text-dark">
                            <thead>
                                <tr>


                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Guest</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($tables as $key => $table)
                                    <tr>

                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $table->name }}</td>
                                        <td>{{ $table->email }}</td>
                                        <td>{{ $table->phone }}</td>
                                        <td>{{ $table->guest }}</td>
                                        <td>{{ $table->date }}</td>
                                        <td>{{ $table->time }}</td>
                                        <td>{{ $table->message }}</td>
                                        <td>
                                            <a href="{{ route('delete.reservation', $table->id) }}" class="btn btn-danger"
                                                onClick="confirmation(event)">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach




                            </tbody>
                        </table>
                        {{ $tables->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
