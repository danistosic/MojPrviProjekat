@extends("layout")

@section("naslovStranice")
    Contact
@endsection

@section("sadrzajStranice")
<form class="p-4">
    <div class="mb-3">
        <label for="exampleInputEmail" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail" placeholder="name@example.com">
    </div>

    <div class="mb-3">
        <label for="exampleInputSubject" class="form-label">Subject</label>
        <input type="text" class="form-control" id="exampleInputSubject" placeholder="Subject">
    </div>

    <div class="mb-3">
        <label for="exampleInputMessage" class="form-label">Message</label>
        <textarea class="form-control" id="exampleInputMessage" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div class="d-flex justify-content-center">
    <div class="ratio ratio-16x9" style="max-width: 40%;">
        
    <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27609.23528348339!2d8.5142347!3d47.3778761!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47900a1b22b1bc5b%3A0x421dd1e0c58a2d9!2sZ%C3%BCrich%2C%20Switzerland!5e0!3m2!1shr!2shr!4v1731340200000!5m2!1shr!2shr"
    width="600"
    height="450"
    style="border:0; border-radius:10px;"
    allowfullscreen=""
    loading="lazy"
    referrerpolicy="no-referrer-when-downgrade">
    </iframe>

    </div>
</div>
@endsection

