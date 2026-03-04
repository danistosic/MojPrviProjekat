@extends('layout')

@section('naslovStranice')
    Trgovina
@endsection

@section('sadrzajStranice')
    @foreach ($products as $product)
        <div>
            <p>{{ $product->name }}</p>
            <p>{{ $product->description }}</p>

            <a href="{{ route('products.permalink', ['product' => $product->id]) }}">
                Detaljnije
            </a>
        </div>
    @endforeach
@endsection
