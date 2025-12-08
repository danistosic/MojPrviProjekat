@extends('layout')

@section('naslovStranice')
  Glavna stranica
@endsection

@section('sadrzajStranice')
  

   <form method="POST" action="/send-contact" class="mb-4 mx-auto" style="max-width: 400px;">

    @if($errors->any())
        <p>Greska: {{ $errors->first() }}</p>
    @endif

    @csrf

    <div class="mb-3">
        <input 
            type="email" 
            name="email" 
            class="form-control" 
            placeholder="Enter your email address">
    </div>

    <div class="mb-3">
        <input 
            type="text" 
            name="subject" 
            class="form-control" 
            placeholder="Enter message subject">
    </div>

    <div class="mb-3">
        <textarea 
            name="description" 
            class="form-control" 
            rows="3"
            placeholder="Enter message description"></textarea>
    </div>

    <button class="btn btn-primary w-100">Send Message</button>
</form>

@endsection




