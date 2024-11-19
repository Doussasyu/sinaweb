<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengguna</title>
</head>
<body>
    <h1>Tambah Pengguna</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <label>Confirm Password:</label>
        <input type="password" name="password_confirmation" required>
        <button type="submit">TAMBAH</button>
    </form>
</body>
</html>