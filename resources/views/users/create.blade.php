<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            font-size: 1.8rem;
            color: #333333;
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-size: 1rem;
            color: #555555;
            margin-bottom: 8px;
            display: block;
        }
        input {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            color: #333333;
            border: 1px solid #cccccc;
            border-radius: 5px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        input:focus {
            border-color: #007bff;
            outline: none;
        }
        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        button, .link-button {
            flex: 1;
            padding: 12px;
            font-size: 1rem;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }
        button.add-button {
            background-color: #007bff;
        }
        button.add-button:hover {
            background-color: #0056b3;
        }
        button.clear-button {
            background-color: #dc3545;
        }
        button.clear-button:hover {
            background-color: #b02a37;
        }
        .link-button {
            background-color: #6c757d;
        }
        .link-button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Tambah Pengguna</h1>
        <form id="userForm" action="{{ route('users.store') }}" method="POST">
            @csrf
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" placeholder="Masukkan nama" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email" required>

            <label for="password">Kata Sandi:</label>
            <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>

            <label for="password_confirmation">Konfirmasi Kata Sandi:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi kata sandi" required>

            <div class="button-group">
                <!-- Tombol Tambah -->
                <button type="submit" class="add-button">Tambah</button>
                <!-- Tombol Clear -->
                <button type="button" class="clear-button" onclick="clearForm()">Kosongkan</button>
                <!-- Tombol Kembali ke Dashboard -->
                <a href="{{ route('dashboard') }}" class="link-button">Kembali</a>
                </div>
        </form>
    </div>

    <script>
        // Fungsi untuk mengosongkan formulir
        function clearForm() {
            document.getElementById('userForm').reset();
        }
    </script>
</body>
</html>
