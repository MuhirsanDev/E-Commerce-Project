<!DOCTYPE html>
<html>

  <head> 
    {{-- Css Admin Page --}}
    @include('admin.css')

    {{-- CSS Internal --}}
    <style>
        input[type='text']{
            width: 200px;
            height: 40px;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px;
        }

        /* Custom CSS for SweetAlert */
        .swal-modal {
            width: 250px !important;
        }
        .swal-title {
            font-size: 18px;
        }
        .swal-text {
            font-size: 14px;
        }
    </style>
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

            <h3 style="color: white">Add Category</h3>

            {{-- Category Input --}}
            <div class="div_deg">
                <form action="{{ url('add_category') }}" method="post">
                    @csrf
                    <div>
                        <input type="text" name="category">
                        <input type="submit" class="btn btn-primary" value="Add Category">
                    </div>
                   </form>
            </div> 
          </div>
          {{-- Category Tabel --}}
          <div>
            <table class="table table-dark">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Category Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $category->category_name }}</td>
                  <td>
                    <form action="{{ url('delete_category', $category->id) }}" method="POST" style="display: inline;">
                      @csrf
                      <a type="submit" class="btn btn-danger btn-sm" onclick="confirmation(event)">Delete</a>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script>
      function confirmation(ev){
        ev.preventDefault();
        var form = ev.currentTarget.closest('form');
        swal({
          title : "Are You Sure To Delete This",
          text : "This delete will be permanent",
          icon : "warning",
          buttons : true,
          dangerMode : true,
        })
        .then((willDelete) =>{
          if(willDelete){
            form.submit();
          }
        });
      }
    </script>
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
    {{-- Sweet alert link --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>