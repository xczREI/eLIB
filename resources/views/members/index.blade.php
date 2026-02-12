<table border="1" cellpadding="10">
    <tr>
        <th>Name</th>
        <th>Student ID</th>
        <th>QR Code</th>
        <th>Actions</th> </tr>

    @foreach($members as $member)
    <tr>
        <td>{{ $member->name }}</td>
        <td>{{ $member->student_id }}</td>
        <td>
            @if($member->qr_code)
                <img src="{{ asset($member->qr_code) }}" width="50">
            @endif
        </td>
        <td>
            <a href="{{ route('members.show', $member->id) }}">View QR</a>
        </td>
    </tr>
    @endforeach
</table>