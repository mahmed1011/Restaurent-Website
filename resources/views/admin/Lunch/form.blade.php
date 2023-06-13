
@extends('admin.layout')
@section('content')
<form action="{{ route('store.lunch',$lunch->id ?? '') }}" method="POST" style="    margin-left: 28%;margin-top: 6%;" enctype="multipart/form-data">
    @csrf

    {{-- <div class="mb-3">
        <label for="" class="form-label">Tilte</label>
        <input type="text" class="form-control" name="title" value="{{  $lunch->title ?? ''}}">
    </div> --}}
    {{-- <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Old Image</label>
        <img  class="form-control" src="/image/{{ $lunch->image }}" style="width: 7rem;border-radius: 50px;">
    </div> --}}
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Heading</label>
        <input type="text" class="form-control" name="heading" value="{{ $lunch->heading ?? ''}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Discription</label>
        <input type="text" class="form-control" name="discription" value="{{ $lunch->discription ?? ''}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Image</label>
        <input type="file" class="form-control" name="image" value="{{ $lunch->image ?? ''}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Price</label>
        <input type="text" class="form-control" name="price" value="{{ $lunch->price ?? ''}}">
    </div>
    <button type=" submit" class="btn btn-primary">Submit</button>
</form>
@endsection