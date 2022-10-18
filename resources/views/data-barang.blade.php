@extends('template')
@section('content')
<div class="jumbotron mt-3">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kuantitas</th>
            <th>Dibuat oleh</th>
            <th>Tanggal</th>
        </tr>
        @foreach ($datas as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->quantity }}</td>
            <td>{{ $student->added_by }}</td>
            <td>{{ $student->created_at }}</td>
            {{-- <td>
                <form action="{{ route('destroy',$student->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('edit',$student->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td> --}}
        </tr>
        @endforeach
    </table>
</div>
@endsection