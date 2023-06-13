<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="text-center">

        <h1>Order Details</h1>
        Customer Name: <h3>{{ $order->name }}</h3>
        Customer Email: <h3>{{ $order->email }}</h3>

        Product Name: <h3>{{ $order->heading }}</h3>
        Product Price: <h3>{{ $order->price }}</h3>
        Product Quantity: <h3>{{ $order->quantity }}</h3>
        Payment Status: <h3>{{ $order->payment_status }}</h3>
        <br>Image:<br>
        <img src="image/{{ $order->image }}" style="width: 250px;border-radius: 450px;">
    </div>
</body>

</html>
