@extends('template')
@section('content')
<div class="jumbotron mt-3">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($datas as $student)
        <tr>
            @if($student->role == 'user')
            <td>{{ ++$i }}</td>
            <td>{{ $student->name }}</td>
            <td>
                <form action="{{ route('destroy',$student->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('edit',$student->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            @else
            @endif 
        </tr>
        @endforeach
    </table>
</div>
@endsection