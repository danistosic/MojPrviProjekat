@extends('layout')

@section('sadrzajStranice')

<div class="container mt-4" style="max-width:500px;">

<h2 class="mb-3">{{ $product->name }}</h2>

<p class="text-muted fs-5">Price: {{ $product->price }}</p>

<form method="POST" action="{{ route('cart.add') }}">
@csrf

<input type="hidden" name="id" value="{{ $product->id }}">

<label class="form-label">Quantity</label>

<div class="input-group mb-3" style="max-width:200px;">

<input 
type="number"
name="amount"
value="1"
min="1"
class="form-control text-center"
>

<button class="btn btn-success">
Add to cart
</button>

</div>

</form>

</div>

@endsection
