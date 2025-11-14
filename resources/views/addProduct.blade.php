<div class="container mt-5" style="max-width: 500px;">
    <h3 class="mb-4">Add New Product</h3>

    <form method="POST" action="/admin/add-product">
        @csrf

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Product name">
        </div>

        <div class="mb-3">
            <label>Description:</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Description"></textarea>
        </div>

        <div class="mb-3">
            <label>Amount:</label>
            <input type="number" name="amount" class="form-control" placeholder="Amount">
        </div>

        <div class="mb-3">
            <label>Price:</label>
            <input type="text" name="price" class="form-control" placeholder="Price">
        </div>

        <div class="mb-3">
            <label>Image URL:</label>
            <input type="text" name="image" class="form-control" placeholder="Image URL">
        </div>

        <button class="btn btn-primary w-100">Add Product</button>

        <a href="/admin/products" class="btn btn-secondary w-100 mt-2">Back to All Products</a>
    </form>
</div>

