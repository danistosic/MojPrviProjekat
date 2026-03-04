@extends("layout")

@section("sadrzajStranice")

@foreach($cart as $item)

<p>{{ $products[$item['product_id']]->name }}</p>
<p>Količina: {{ $item['amount'] }}</p>

@endforeach

@endsection
