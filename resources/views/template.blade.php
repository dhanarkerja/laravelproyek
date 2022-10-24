<!doctype html>
<html lang="en">
  <head>
    <title>{{ config('app.name') }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  </head>
  <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('dashboard') }}">{{ config('app.name') }}</a>
                <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="my-nav" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        @guest('admin')
                        <li class="nav-item">
                            <a href="{{ route('admin.login') }}" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.register') }}" class="nav-link">Register</a>
                        </li>
                        @else
                        @can('role',['admin','editor'])
                            <li class="nav-item">
                                <a href="{{ route('post') }}" class="nav-link">Data Post</a>
                            </li>
                        @endcan
                        @can('role',['admin','pembelian'])
                        <li class="nav-item">
                            <a href="{{ route('barang') }}" class="nav-link">Penerimaan barang</a>
                        </li>
                        @endcan
                        @can('role','admin')
                            <li class="nav-item">
                                <a href="{{ route('admin') }}" class="nav-link">Data Admin</a>
                            </li>
                        @endcan
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">My Profile</a>
                                <a href="{{ route('admin.logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="dropdown-item">Logout</a>
                                <form action="{{ route('admin.logout') }}" id="logout-form" method="post">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
        @yield('content')
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    
      
    <script>
        $(document).ready(function() {
            read()
        });
        // Read Database
        function read() {
            $.get("{{ route('getBarang') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }
        // modal create barang
        function create() {
            $.get("{{  route('createBarang') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Create Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }
          // untuk proses create data
        function store() {
            var name = $("#name").val();
            var quantity = $("#quantity").val();
            $.ajax({
                type: "get",
                url: "{{ route('storeBarang') }}",
                data: { 'name': name, 'quantity':quantity},
                success: function(data) {
                    $(".btn-close").click();
                    read()
                }
            });
        }
        // menampilkan modal
        function show(id) {
            $.get("{{ url('admin/show-barang') }}"+'/'+id, {}, function(data, status) {
                $("#exampleModalLabel").html('Edit Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }
        // untuk proses update data
        function update(id) {
            var name = $("#nameEditBarang").val();
            var quantity = $("#quantityEditBarang").val();
            $.ajax({
                type: "get",
                url: "{{ url('admin/update-barang') }}"+'/'+ id,
                data:{ 'name': name, 'quantity':quantity},
                success: function(data) {
                    $(".btn-close").click();
                    read()
                }
            });
        }
        // untuk delete atau destroy data
        function destroy(id) {
            $.ajax({
                type: "get",
                url: "{{ url('admin/destroy-barang') }}"+'/'+ id,
                data: "name=" + name,
                success: function(data) {
                    $(".btn-close").click();
                    read()
                }
            });
            }
    </script>

  </body>
</html>