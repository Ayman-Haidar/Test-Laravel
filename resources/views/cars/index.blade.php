<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

     {{-- <link rel="stylesheet" href="{{ asset('css/cars.css') }}">
     @vite('resources/css/cars.css') --}}


    <title>Cars</title>
</head>
<body>
    <table class="table">
  <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">NAME</th>
        <th scope="col">MODEL</th>
        <th scope="col">DETAILS</th>
        <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($Cars as $Car)
        <tr>
            <td>{{ $Car->id }}</td>
            <td>{{ $Car->name }}</td>
            <td>{{ $Car->model }}</td>
            <td>{{ $Car->details }}</td>
            <td>
                <a href="{{ route('cars.edit', $Car->id) }}" class="btn btn-outline-primary">Update</a>
                {{-- <a href="{{ route('cars.delete', $Car->id) }}" class="btn btn-danger">Delete</a> --}}
                <form action="{{ route('cars.delete', $Car->id) }}" method="POST" style="display: inline-block;"
                    onsubmit="return confirm('Are you sure you want to delete this car?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>

            </td>
        </tr>

    @endforeach

  </tbody>
</table>
<a href="{{ route('cars.create') }}" class="btn btn-outline-primary">Create Car</a>

</body>
</html>
