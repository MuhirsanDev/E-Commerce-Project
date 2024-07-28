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
      </div>
    </div>
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