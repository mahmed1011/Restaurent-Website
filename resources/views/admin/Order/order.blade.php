@extends('admin.layout')
@section('content')
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

                        <h4 class="mt-3 panel-title display-td" style="color: black;
">All Orders


                        </h4>
                    </div>
                    <div class="card-body text-dark" style="overflow-x:auto;font-size: 14px;">
                        <table class="table text-dark">
                            <thead>
                                <tr>


                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Heading</th>
                                    <th>Discription</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Payment Status</th>
                                    <th>Delivery Status</th>
                                    <th>Delivered</th>
                                    <th>Print PDF</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($orders as $key => $order)
                                    <tr>

                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->heading }}</td>
                                        <td>{{ $order->discription }}</td>
                                        <td><img src="{{ asset('image/' . $order->image) }}" alt=""
                                                style="width: 30px;border-radius: 50px;"></td>
                                        <td>{{ $order->price }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->payment_status }}</td>
                                        <td>{{ $order->delivery_status }}</td>
                                        <td>
                                            @if ($order->delivery_status == 'processing')
                                                <a href="{{ route('order.delivered', $order->id) }}"
                                                    class="btn btn-primary"
                                                    onClick="return confirm('Are you sure to Deliver this product ?')">Delivered</a>
                                            @else
                                                <p class="btn btn-success">Delivered</p>
                                            @endif
                                        </td>
                                        <td><a href="{{ route('print.PDF', $order->id) }}">
                                                <button class="btn btn-outline-secondary"
                                                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                                    Print PDF</button>
                                            </a></td>
                                    </tr>
                                @endforeach




                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
