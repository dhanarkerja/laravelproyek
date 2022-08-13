@extends('template')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2>Edit {{ $data->name }}</h2>
            </div>
            <div>
                <a class="btn btn-primary" href="{{ route('admin') }}"> Back</a>
            </div>
            <form action="{{ route('update',$data->id) }}" method="POST">
                @csrf
                @method('PUT')
           
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" value="{{ $data->name }}" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Kelas:</strong>
                            <input class="form-control" name="kelas" placeholder="Kelas" value="{{ $student->kelas }}">
                        </div>
                    </div> --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
           
            </form>
        </div>
    </div>
@endsection