<!DOCTYPE html>
<html>

  <head> 
    {{-- Css Admin Page --}}
    @include('admin.css')

    <style>
        .div_deg{
            display: flex;
            text-align: center;
            margin-top: 40px;
        }

        label{
            display: inline-block;
            width: 200px;
            font-size: 18px !important;
            color: white !important;
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

            {{-- Admin Body Page --}}
        <h3 class="text-white">Add Product</h3>
           <div class="div_deg">
            <form action="{{ url('upload_product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="margin-bottom: 15px; display: flex; align-items: center;">

                    <label for="title" style="width: 200px; text-align: left;">Product Title</label>
                    <input id="title" type="text" name="title" required style="width: 300px; height: 40px;">

                </div>

                <div style="margin-bottom: 15px; display: flex; align-items: center;">

                    <label for="description" style="width: 200px; text-align: left;">Description</label>
                    <textarea id="description" name="description" required style="width: 300px; height: 70px;"></textarea>

                </div>
                <div style="margin-bottom: 15px; display: flex; align-items: center;">

                    <label for="price" style="width: 200px; text-align: left;">Price</label>
                    <input id="price" type="text" name="price" required style="width: 300px;">
                </div>

                <div style="margin-bottom: 15px; display: flex; align-items: center;">

                    <label for="quantity" style="width: 200px; text-align: left;">Quantity</label>
                    <input id="quantity" type="number" name="quantity" required style="width: 300px;" min="1">

                </div>

                <div style="margin-bottom: 15px; display: flex; align-items: center;">

                    <label for="category" style="width: 200px; text-align: left;">Category</label>
                    <select id="category" name="category" id="category" style="width: 300px; height: 30px;" required>

                        <option disabled selected> Select Category </option>
                        @foreach ($category as $category)
                            <option value="{{ $category->category_name }}"> {{ $category->category_name }}</option>
                        @endforeach

                    </select>
                </div>

                <div style="margin-bottom: 15px; display: flex; align-items: center;">

                    <label for="image" style="width: 200px; text-align: left;">Product Image</label>
                    <input id="image" type="file" name="image" style="width: 300px;">

                </div>

                <div>
                    <input type="submit" class="btn btn-success margin-top-sm" value="Add Product">
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