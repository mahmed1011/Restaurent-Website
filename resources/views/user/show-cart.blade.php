@extends('layout')
@section('content')
    @include('sweetalert::alert')
    <div class="container mt-5 pt-5">
        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="submit" class="close" data-dismiss="alert"></button>
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="overflow-x:auto;">
                    <div class="card-header">
                        <a href="{{ route('home') }}"><button type="button" class="btn btn-outline-dark">Back to Continue
                                Purchase</button></a>
                        </h4>
                    </div>
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Heading</th>
                                <th>Discription</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($carts as $key => $cart)
                                <tr>

                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $cart->heading }}</td>
                                    <td>{{ $cart->discription }}</td>
                                    <td><img src="{{ asset('image/' . $cart->image) }}" alt=""
                                            style="width: 30px;border-radius: 50px;"></td>
                                    <td>Rs.{{ $cart->price }}</td>
                                    <td style="text-align: center;" class="increment-btn">{{ $cart->quantity }}</td>
                                    <td>Rs.{{ $cart->price * $cart->quantity }}</td>
                                    <?php
                                    $total += $cart->price * $cart->quantity;
                                    ?>

                                    <td>
                                        <a href="{{ route('delete.cart.item', $cart->id) }}" class="btn btn-danger"
                                            onClick="confirmation(event)">Delete</a>
                                    </td>
                                </tr>
                            @endforeach




                        </tbody>
                    </table>
                    {{-- @if (method_exists($breakfasts, 'links'))
                            <div
                                style="
                    padding-left: 42%;
                    margin-top: 55px;
                    ">
                                {{ $breakfasts->links() }}
                            </div>
                        @endif --}}

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 my-md-auto mt-3">
                <h5>
                    Get the best deals & Offers <a href=""> shop now </a>
                </h5>
            </div>
            <div class="col-md-4 mt-3">

                <div class="shadow-sm bg-white p-3">
                    <tr>
                        <td>
                            <h6>
                                Total Rs. {{ $total }}
                            </h6>
                        </td>
                    </tr>
                </div>
                <span class="float-end "> </span>
                <br>

                <h5>Proceed To Checkout</h5>
                <div style="display: flex;">
                    <a href="{{ route('cash.order') }}" class="btn btn-info pl-3"> Cash on Delivery </a>
                    <span class="float-end "> </span>
                    <a href="{{ route('stripe', $total) }}" class="btn btn-warning"> Pay Using Card </a>

                </div>
            </div>
        </div>

    </div>
@endsection
