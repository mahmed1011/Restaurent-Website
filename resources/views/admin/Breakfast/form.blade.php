
@extends('admin.layout')
@section('content')
<form action="{{ route('store.breakfast',$breakfast->id ?? '') }}" method="POST" style="    margin-left: 28%;margin-top: 6%;" enctype="multipart/form-data">
    @csrf

    {{-- <div class="mb-3">
        <label for="" class="form-label">Tilte</label>
        <input type="text" class="form-control" name="title" value="{{  $breakfast->title ?? ''}}">
    </div> --}}
    {{-- <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Old Image</label>
        <img  class="form-control" src="/image/{{ $breakfast->image }}" style="width: 7rem;border-radius: 50px;">
    </div> --}}
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Heading</label>
        <input type="text" class="form-control" name="heading" value="{{ $breakfast->heading ?? ''}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Discription</label>
        <input type="text" class="form-control" name="discription" value="{{ $breakfast->discription ?? ''}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Image</label>
        <input type="file" class="form-control" name="image" value="{{ $breakfast->image ?? ''}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Price</label>
        <input type="text" class="form-control" name="price" value="{{ $breakfast->price ?? ''}}">
    </div>
    <button type=" submit" class="btn btn-primary">Submit</button>
</form>
@endsection