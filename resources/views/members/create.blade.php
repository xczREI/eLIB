<h1>Add Member</h1>

<form action="{{ route('members.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Name" required>
    <br><br>

    <input type="text" name="student_id" placeholder="Student ID" required>
    <br><br>

    <button type="submit">Save</button>
</form>
