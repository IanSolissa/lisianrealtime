<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach ($testing as $pesan)
        {{ $pesan->user->name }}
    @endforeach
    <h1>Hello World</h1>
    @vite('resources/js/app.js')
    <script>
       
    </script>
</body>
</html>