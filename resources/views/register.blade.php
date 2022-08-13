@extends('template')
@section('content')
<div class="row">
    <div class="col-md-4 offset-md-4 mt-5">
        <div class="card">
            <div class="card-header bg-dark text-light">
                Register
            </div>
            <div class="card-body p-2">
                <form action="{{ route('register.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text"
                          class="form-control"
                          name="name"
                          placeholder="Name" />
                      </div>
                    <div class="form-group">
                      <input type="email"
                        class="form-control"
                        name="email"
                        placeholder="Email" />
                    </div>
                    <div class="form-group">
                      <input type="password"
                        class="form-control"
                        name="password"
                        placeholder="Password" />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-block">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection