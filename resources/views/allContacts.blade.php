@extends("layout")

@section("sadrzajStranice")

<div class="container mt-4">

    <h3 class="mb-4">All Contacts</h3>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($allContacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->subject }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>
                        <a href="/admin/delete-contact/{{ $contact->id }}" class="btn btn-danger btn-sm">Delete</a>
                        <a class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection


