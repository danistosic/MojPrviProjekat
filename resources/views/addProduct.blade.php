@extends("layout")

@section("sadrzajStranice")

<div class="container mt-5" style="max-width: 600px;">

    <h3 class="mb-4 text-center">Add New Product</h3>

    <div class="card shadow-sm p-4">

        <form method="POST" action="/admin/add-product">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter product name">
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="description" class="form-control" placeholder="Enter description">
            </div>

            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" name="amount" class="form-control" placeholder="Enter amount">
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Enter price">
            </div>

            <div class="mb-3">
                <label class="form-label">Image URL</label>
                <input type="text" name="image" class="form-control" placeholder="Enter image URL">
            </div>

            <button class="btn btn-primary w-100">Create Product</button>

            <a href="/admin/products" class="btn btn-secondary w-100 mt-3">Back to All Products</a>

        </form>

    </div>

</div>

@endsection


