@extends('layout')

@section('sadrzajStranice')
    <div class="container mt-4">

        <h3 class="mb-4">All Products</h3>

        <a href="{{ route('products.add') }}" target="_blank">
            <button style="margin-bottom:15px;padding:8px 15px;">
                Add Product
            </button>
        </a>

        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($allProducts as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->amount }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->image }}</td>

                        <td>
                            <a href="{{ route('products.delete', $product->id) }}" class="btn btn-danger btn-sm">
                                Delete
                            </a>

                            <a href="{{ route('products.single', $product->id) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
@endsection
