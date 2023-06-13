@extends('admin.layout')
@section('content')
<form action="{{ route('store.about',$about->id ?? '') }}" method="POST" style="    margin-left: 28%;margin-top: 6%;" enctype="multipart/form-data">
    @csrf

    {{-- <div class="mb-3">
        <label for="" class="form-label">Tilte</label>
        <input type="text" class="form-control" name="title" value="{{  $about->title ?? ''}}">
    </div> --}}
    {{-- <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Old Image</label>
        <img  class="form-control" src="/image/{{ $about->image }}" style="width: 7rem;border-radius: 50px;">
    </div> --}}
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Heading</label>
        <input type="text" class="form-control" name="heading" value="{{ $about->heading ?? ''}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Discription</label>
        <input type="text" class="form-control" name="discription" value="{{ $about->discription ?? ''}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">1st Image</label>
        <input type="file" class="form-control" name="image1" value="{{ $about->image1 ?? ''}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">2nd Image</label>
        <input type="file" class="form-control" name="image2" value="{{ $about->image2 ?? ''}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">3rd Image</label>
        <input type="file" class="form-control" name="image3" value="{{ $about->image3 ?? ''}}">
    </div>
    <button type=" submit" class="btn btn-primary">Submit</button>
</form>
@endsection