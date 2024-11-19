<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengguna</title>
</head>
<body>
    <h1>Edit Pengguna</h1>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ $user->name }}" required>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required>
        <label>Password (Optional):</label>
        <input type="password" name="password">
        <label>Confirm Password:</label>
        <input type="password" name="password_confirmation">
        <button type="submit">EDIT</button>
    </form>
</body>
</html>
