@extends('layouts.app')
@section('content')
<form action={{ route('cars.update', $car->id) }} method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $car->name }}">
        @error('name')
            {{ $message }}
        @enderror

        <label for="model">Model</label>
        <input type="text" name="model" id="model" value="{{ $car->model }}">
        @error('model')
            {{ $message }}
        @enderror

        <label for="details">Details</label>
        <input type="text" name="details" id="details" value="{{ $car->details }}">
        @error('details')
            {{ $message }}
        @enderror

        <button type="submit" class="btn btn-outline-danger">Submit</button>
    </form>
@endsection
