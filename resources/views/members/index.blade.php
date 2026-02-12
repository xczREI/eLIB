<h1>Members List</h1>

<a href="{{ route('members.create') }}">Add Member</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>Name</th>
        <th>Student ID</th>
        <th>QR Code</th>
    </tr>

    @foreach($members as $member)
    <tr>
        <td>{{ $member->name }}</td>
        <td>{{ $member->student_id }}</td>
        <td>
            @if($member->qr_code)
                <img src="{{ asset($member->qr_code) }}" width="100">
            @endif
        </td>
    </tr>
    @endforeach
</table>
