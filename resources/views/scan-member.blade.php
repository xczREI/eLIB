<!DOCTYPE html>
<html>
<head>
    <title>Scan Member</title>
</head>
<body>

<h2>Scan Member QR</h2>

@if(session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form method="POST" action="/scan-member">
    @csrf
    <input type="text"
           name="code"
           id="scanner-input"
           autofocus
           placeholder="Scan member QR here"
           style="width:300px; padding:10px; font-size:18px;">
</form>

<script>
document.getElementById('scanner-input').addEventListener('change', function() {
    this.form.submit();
});
</script>

</body>
</html>
