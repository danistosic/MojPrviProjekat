@extends("layout")

@section("naslovStranice")
    Glavna stranica
@endsection

@section("sadrzajStranice")
    <p>Trenutno vrijeme je {{ date("H:i:s") }}</p>
@endsection

