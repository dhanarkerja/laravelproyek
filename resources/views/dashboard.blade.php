@extends('template')
@section('content')
<div class="jumbotron mt-3">
    <h1 class="display-4">Dashboard</h1>
    <p>Lorem ipsum....</p>
</div>

<div class="jumbotron" style="background:transparent !important" >
<div class="row scroll-barang d-flex justify-content-center ">
@foreach ($datas as $student)
    <div class="card m-1 col-2  ">
        <div class="card-body">
        <h5 class="card-title">{{ $student->name }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $student->quantity }}</h6>
        <p class="card-text">{{ $student->added_by }}</p>
        {{-- <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a> --}}
        </div>
    </div>
@endforeach
</div>
</div>
@endsection