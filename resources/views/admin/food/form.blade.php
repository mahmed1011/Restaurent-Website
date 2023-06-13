@extends('admin.layout')
@section('content')
<form action="{{ route('store.food',$food->id ?? '') }}" method="POST" style="    margin-left: 28%;margin-top: 6%;" enctype="multipart/form-data">
    @csrf

    {{-- <div class="mb-3">
        <label for="" class="form-label">Tilte</label>
        <input type="text" class="form-control" name="title" value="{{  $food->title ?? ''}}">
    </div> --}}
    {{-- <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Old Image</label>
        <img  class="form-control" src="/image/{{ $food->image }}" style="width: 7rem;border-radius: 50px;">
    </div> --}}
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Heading</label>
        <input type="text" class="form-control" name="heading" value="{{ $food->heading ?? ''}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Discription</label>
        <input type="text" class="form-control" name="discription" value="{{ $food->discription ?? ''}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">New Image</label>
        <input type="file" class="form-control" name="image" value="{{ $food->image ?? ''}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Price</label>
        <input type="text" class="form-control" name="price" value="{{ $food->price ?? ''}}">
    </div>
    <button type=" submit" class="btn btn-primary">Submit</button>
</form>
@endsection