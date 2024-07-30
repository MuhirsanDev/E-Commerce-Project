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

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h3 style="color: white">Edit Category</h3>
                <div class="div_deg">
                    <form action="{{ url('update_category', $category->id) }}" method="post">
                        @csrf
                        <div>
                            <input type="text" name="category_name" value="{{ $category->category_name }}">
                            <input type="submit" class="btn btn-primary" value="Update Category">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>