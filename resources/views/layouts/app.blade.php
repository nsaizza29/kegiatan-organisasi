<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto py-8">
        {{ $slot }}
    </div>

    @livewireScripts
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</body>
</html>
