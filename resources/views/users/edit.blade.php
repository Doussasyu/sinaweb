<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f9;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
        }
        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-submit {
            background-color: #4caf50;
            color: white;
        }
        .btn-clear {
            background-color: #f44336;
            color: white;
        }
        .btn-back {
            background-color: #008cba;
            color: white;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Pengguna</h1>
        <form action="{{ route('users.update', $user) }}" method="POST" id="userForm">
            @csrf
            @method('PUT')
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" required>

            <label for="password">Password (Optional):</label>
            <input type="password" id="password" name="password">

            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">

            <div class="buttons">
                <button type="submit" class="btn btn-submit">Edit</button>
                <button type="button" class="btn btn-clear" onclick="clearForm()">Clear</button>
                <button class="btn btn-back" onclick="window.location.href='{{ route('dashboard') }}'">Kembali</button>
            </div>
        </form>

    </div>

    <script>
        // Function to clear form inputs
        function clearForm() {
            document.getElementById("userForm").reset();
        }
    </script>
</body>
</html>
