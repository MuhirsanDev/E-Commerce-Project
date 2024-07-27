<html>

<head>
    @include('home.css')
</head>

<body>
    <!-- start hero area -->
  <div class="hero_area">

    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

    <!-- slider section -->
    @include('home.slider')
    <!-- end slider section -->

  </div>
  <!-- end hero area -->

  <!-- shop section -->
  @include('home.product')
  <!-- end shop section -->

  <!-- contact section -->
  @include('home.contact')
  <!-- end contact section -->

  <!-- info section -->
  @include('home.footer')
  <!-- end info section -->

</body>

</html>