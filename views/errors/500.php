<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Server Error</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-red-50 to-pink-50 dark:from-gray-900 dark:to-gray-800 min-h-screen flex items-center justify-center p-4">
    <div class="text-center">
        <div class="text-9xl font-bold text-gray-300 dark:text-gray-700 mb-4">500</div>
        
        <h1 class="text-4xl font-bold mb-4 bg-gradient-to-r from-red-600 to-pink-600 bg-clip-text text-transparent">
            Server Error
        </h1>
        
        <p class="text-xl text-gray-600 dark:text-gray-400 mb-8 max-w-lg mx-auto">
            Something went wrong on our end. Please try again later.
        </p>
        
        <div class="space-x-4">
            <a href="/framework" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg font-semibold hover:from-blue-600 hover:to-purple-700 transition transform hover:scale-105">
                <i class="fas fa-home mr-2"></i>
                Go Home
            </a>
            
            <button onclick="location.reload()" class="inline-flex items-center px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-300 rounded-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition transform hover:scale-105">
                <i class="fas fa-sync-alt mr-2"></i>
                Try Again
            </button>
        </div>
    </div>
</body>
</html>