@extends('layout')

@section('sadrzajStranice')
    <div class="container mt-4">

        <h3 class="mb-4">All Products</h3>

        {{-- Flash poruka nakon uspješnog editiranja proizvoda --}}
        @if (session('success'))
            <div id="success-alert" class="alert alert-success"
                style="background: rgba(40, 167, 69, 0.2); 
            border: 1px solid rgba(40, 167, 69, 0.4); 
            color: #155724;
            backdrop-filter: blur(4px);
            border-radius: 8px;">
                {{ session('success') }}
            </div>

            <script>
                // Automatski sakrij poruku nakon 3 sekunde
                setTimeout(function() {
                    const alert = document.getElementById('success-alert');
                    if (alert) {
                        alert.style.transition = "opacity 0.8s";
                        alert.style.opacity = "0";
                        setTimeout(() => alert.remove(), 800);
                    }
                }, 3000);
            </script>
        @endif

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
                            <form action="{{ route('product.delete', ['product' => $product->id]) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>

                            <a href="{{ route('product.edit', ['product' => $product->id]) }}"
                                class="btn btn-primary btn-sm">Edit</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
