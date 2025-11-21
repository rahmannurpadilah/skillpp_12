<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white shadow-lg rounded-2xl p-8">

        <h3 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Login
        </h3>

        @if(session('error'))
            <div class="mb-4 px-4 py-3 bg-red-100 text-red-700 rounded-lg text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <label class="block mb-2 text-gray-700 font-medium">Username</label>
            <input type="text" name="username"
                   placeholder="Masukkan username"
                   required
                   class="w-full px-4 py-2 mb-4 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-700">

            <label class="block mb-2 text-gray-700 font-medium">Password</label>
            <input type="password" name="password"
                   placeholder="Masukkan password"
                   required
                   class="w-full px-4 py-2 mb-6 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-700">

            <button type="submit"
                    class="w-full py-3 bg-gray-800 text-white rounded-lg font-semibold hover:bg-gray-900 transition">
                Login
            </button>
        </form>

        <p class="text-center text-gray-400 text-sm mt-6">
            © {{ date('Y') }} Sistem Login
        </p>

    </div>

</body>
</html>
