<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<h1>POST received!</h1>";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    echo "<a href='test-form.php'>Back to form</a>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Test POST</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Test POST Form</h1>
        <form method="POST" action="test-form.php">
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Email</label>
                <input type="email" name="email" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Password</label>
                <input type="password" name="password" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                Submit
            </button>
        </form>
    </div>
</body>
</html>