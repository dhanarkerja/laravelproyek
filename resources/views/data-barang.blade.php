@extends('template')
@section('content')
<div class="jumbotron mt-3">
  <div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-lg ">
            <h1>Barang Terima</h1>
            <label for="gsearch">Search Barang:</label>
            <input type="search" id="search" name="search" onkeyup="read()">
            <button class="btn btn-primary" onClick="create()">+ Tambah Product</button>
            <div id="read" class="mt-3"></div> {{-- id=read untuk menyambungkan halaman read --}}
        </div>
    </div>
  </div>
        {{-- modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div id="page" class="p-2"></div>
                  </div>
              </div>
          </div>
      </div>
  
</div>
@endsection