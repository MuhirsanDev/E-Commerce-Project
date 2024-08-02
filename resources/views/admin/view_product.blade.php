<!DOCTYPE html>
<html>

  <head> 
    {{-- Css Admin Page --}}
    @include('admin.css')
  </head>
  
  <body>
    {{-- Header Admin Page --}}
    @include('admin.header')

    {{-- Sidebar Navigation Admin Page --}}
    @include('admin.sidebar')

      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            {{-- Admin Body Page --}}

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover w-100" style="width: 100%; color: white; border: 1px solid white;">

                <thead style="color: white; border: 1px solid white;">
                    <tr>
                    <th style="color: white; border: 1px solid white; white-space: nowrap;">No</th>
                    <th style="color: white; border: 1px solid white; white-space: nowrap;">Product Title</th>
                    <th style="color: white; border: 1px solid white; width: 30%;">Description</th>
                    <th style="color: white; border: 1px solid white; white-space: nowrap;">Category</th>
                    <th style="color: white; border: 1px solid white; white-space: nowrap;">Price</th>
                    <th style="color: white; border: 1px solid white; white-space: nowrap;">Quantity</th>
                    <th style="color: white; border: 1px solid white; white-space: nowrap;">Image</th>
                    <th style="color: white; border: 1px solid white; white-space: nowrap;">Action</th>
                    </tr>
                </thead>

                <tbody style="color: white; border: 1px solid white;">

                    @foreach ($product as $products)
                    <tr>
                        <td style="color: white; border: 1px solid white; white-space: nowrap;">{{ $loop->iteration }}</td>
                        <td style="color: white; border: 1px solid white; white-space: nowrap;">{{ $products->title }}</td>
                        <td style="color: white; border: 1px solid white; width: 30%;">{{ $products->description }}</td>
                        <td style="color: white; border: 1px solid white; white-space: nowrap;">{{ $products->category }}</td>
                        <td style="color: white; border: 1px solid white; white-space: nowrap;">{{ $products->price }}</td>
                        <td style="color: white; border: 1px solid white; white-space: nowrap;">{{ $products->quantity }}</td>
                        <td style="color: white; border: 1px solid white; white-space: nowrap;"><img height="100" width="100" src="products/{{ $products->image }}"></td>
                        <td style="text-align: center; color: white; border: 1px solid white; white-space: nowrap;">
                            <form action="{{ route('edit_product', $products->id) }}" method="GET">
                              <button type="submit" class="btn btn-success">Edit</button>
                            </form>
                          
                          <form class="mt-1" action="{{ route('delete_product', $products->id) }}" method="POST">
                            @csrf
                            @method('DELETE') <!-- Menambahkan metode DELETE -->
                            <button onclick="confirmation(event)" type="submit" class="btn btn-danger">Delete</button>
                          </form>
                          
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
                </table>

                {{-- Menambahlan Pagination --}}
                <div class="mt-2 d-flex justify-content-center">
                    {{ $product->onEachSide(1)->links() }}
                </div>
            </div>
           
            {{-- End --}}

          </div>
      </div>
    </div>

    {{-- Javascript for confirm delete data --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      function confirmation(ev) {
        ev.preventDefault();
        var form = ev.currentTarget.closest('form');
        swal({
          title: "Are you sure to delete this?",
          text: "This delete will be permanent",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
          }
        });
      }
    </script>
    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
  </body>
</html>