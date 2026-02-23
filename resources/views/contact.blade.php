@extends('layout')

@section('naslovStranice')
    Contact
@endsection

@section('sadrzajStranice')

    <div class="container mt-4">

        <h3>Contact</h3>

        {{-- Flash poruka nakon uspješnog slanja --}}
        @if (session('success'))
            <div class="alert alert-success" id="success-alert">
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

        {{-- Prikaz validacijskih grešaka --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- FORMULAR --}}
        <form class="row g-3" method="POST" action="{{ route('send.contact') }}">
            @csrf

            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail" name="email"
                    placeholder="name@example.com" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputSubject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="exampleInputSubject" name="subject" placeholder="Subject"
                    value="{{ old('subject') }}" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputMessage" class="form-label">Message</label>

                <textarea class="form-control" id="exampleInputMessage" name="message" rows="3">{{ old('message') }}</textarea>

                @error('message')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


        {{-- MAPA --}}
        <div class="d-flex justify-content-center mt-4">
            <div class="ratio ratio-16x9" style="max-width: 40%;">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27614.42830213835!2d8.54169435!3d47.37688655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47900a12141b1dfb%3A0xdeb6d1d286276f4e!2sZ%C3%BCrich!5e0!3m2!1shr!2sch!4v1702050000000!5m2!1shr!2sch"
                    width="600" height="450" style="border:0; border-radius:10px;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>


            </div>
        </div>

    </div>

@endsection
