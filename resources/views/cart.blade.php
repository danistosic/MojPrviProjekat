@extends('layout')

@section('sadrzajStranice')

@if(session('success'))
<div style="background:#d4edda;padding:10px;margin-bottom:15px;border-radius:5px;">
{{ session('success') }}
</div>
@endif

@if(empty($combinedItems))
<p>Cart is empty</p>

@else

@php
$totalCartPrice = 0;
@endphp

@foreach($combinedItems as $index => $item)

<p><strong>{{ $item['name'] }}</strong></p>

<p>Količina: {{ $item['amount'] }}</p>

<p>Cijena: {{ $item['price'] }}</p>

<p>Ukupno: {{ $item['total'] }}</p>

@php
$totalCartPrice += $item['total'];
@endphp

<a href="{{ route('cart.remove', $index) }}">
<button style="padding:5px 10px;margin-bottom:10px;">
Remove
</button>
</a>

<hr>

@endforeach


<h3>Total: {{ $totalCartPrice }}</h3>


<a href="{{ route('cart.finish') }}">
<button style="padding:10px 20px;margin-top:20px;">
Finish order
</button>
</a>

@endif

@endsection
