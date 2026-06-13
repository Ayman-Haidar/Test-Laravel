<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action={{ route('cars.store') }} method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        @error('name')
            {{ $message }}
        @enderror

        <label for="model">Model</label>
        <input type="text" name="model" id="model">
        @error('model')
            {{ $message }}
        @enderror

        <label for="details">Details</label>
        <input type="text" name="details" id="details">
        @error('details')
            {{ $message }}
        @enderror

        <button type="submit">Submit</button>

    </form>
</body>

</html>
