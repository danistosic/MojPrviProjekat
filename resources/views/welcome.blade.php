@extends('layout')

@section('naslovStranice')
  Glavna stranica
@endsection

@section('sadrzajStranice')
  @if ($sat >= 0 && $sat <= 12)
    <p>Dobro jutro!</p>
  @else
    <p>Dobar dan</p>
  @endif

  <p>Trenutno sati: {{ $sat }}</p>
  <p>Trenutno vrijeme je {{ $trenutnoVrijeme }}</p>
@endsection




