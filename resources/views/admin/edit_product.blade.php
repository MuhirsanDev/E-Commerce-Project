<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2>Edit Product</h2>
                <form action="{{ route('update_product', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Product Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $product->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea required name="description" class="form-control">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" name="category" class="form-control" value="{{ $product->category }}" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" value="{{ $product->price }}" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control">
                        <img src="/products/{{ $product->image }}" height="100" width="100">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>