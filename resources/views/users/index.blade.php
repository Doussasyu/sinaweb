<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>

    <h1>Users</h1>
    {{-- @dd($users) --}}

    <a href="{{ route('users.create') }}">Create New User</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>

        @foreach ($users as $user)
<tr>
    <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
    <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
    <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
    <td class="border border-gray-300 px-4 py-2">{{ $user->created_at->format('d M Y') }}</td>
    <td class="border border-gray-300 px-4 py-2">
        <!-- Tombol Edit -->
        <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-2 rounded">
            Edit
        </a>
        <!-- Tombol Hapus -->
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded">
                Hapus
            </button>
        </form>
    </td>
</tr>
@endforeach

    </table>
</body>
</html>
