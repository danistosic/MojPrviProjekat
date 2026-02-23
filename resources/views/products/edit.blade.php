@extends('layout')

@section('sadrzajStranice')

<div class="container mt-5" style="max-width: 680px;">

    <h3 class="mb-4 text-center">Uredi proizvod</h3>

    <form method="POST" action="{{ route('products.save', $product->id) }}">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input value="{{ $product->name }}" type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <input value="{{ $product->description }}" type="text" name="description" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input value="{{ $product->price }}" type="text" name="price" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Amount</label>
            <input value="{{ $product->amount }}" type="text" name="amount" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Image URL</label>
            <input value="{{ $product->image }}" type="text" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary w-100">Spremi promjene</button>

    </form>

</div>

@endsection

