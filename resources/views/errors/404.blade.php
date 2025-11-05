<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>صفحه پیدا نشد | دعوت‌نامه</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-100 via-white to-pink-100 text-center">

    <div class="bg-white/90 backdrop-blur-md p-10 rounded-3xl shadow-2xl max-w-md w-full border border-gray-200">
        <h1 class="text-8xl font-extrabold text-indigo-600 drop-shadow mb-4">404</h1>
        <h2 class="text-2xl font-bold mb-6 text-gray-800">صفحه مورد نظر پیدا نشد 😢</h2>

        <p class="text-gray-600 text-lg mb-10 leading-relaxed">
            به مراسمی دعوت نشدی؟ <br>
            خودت بقیه رو دعوت کن!
        </p>

        <div class="flex justify-center gap-4">
            <a href="{{ route('login') }}"
               class="px-8 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-indigo-500 hover:to-blue-600
                      text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
                ورود به حساب کاربری
            </a>
        </div>
    </div>

</body>
</html>
