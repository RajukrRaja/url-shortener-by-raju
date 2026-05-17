<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>403 - Access Denied</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-100 via-white to-gray-200 flex items-center justify-center px-4">

    <div class="relative overflow-hidden bg-white w-full max-w-xl rounded-[32px] shadow-2xl border border-gray-200 p-10 text-center">

        <div class="absolute -top-10 -right-10 w-40 h-40 bg-red-100 rounded-full blur-3xl opacity-70"></div>

        <div class="relative z-10">



            <h2 class="text-3xl font-bold text-gray-800 mb-4">
                Access Denied
            </h2>

            <p class="text-gray-500 text-base leading-relaxed max-w-md mx-auto mb-8">
                {{ $message ?? 'You are not authorized to access this page or perform this action.' }}
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">

                <a href="{{ url()->previous() }}"
                   class="w-full sm:w-auto inline-flex items-center justify-center px-7 py-3 rounded-2xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold transition duration-200 shadow-lg hover:shadow-xl">

                    ← Go Back

                </a>

                <a href="{{ url('/') }}"
                   class="w-full sm:w-auto inline-flex items-center justify-center px-7 py-3 rounded-2xl border border-gray-300 bg-white hover:bg-gray-100 text-gray-700 font-semibold transition duration-200">

                    Home Page

                </a>

            </div>

        </div>

    </div>

</body>
</html>