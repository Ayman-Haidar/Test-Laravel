@extends('layouts.app')
@section('content')
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
        <x-button1 class="btn-outline-danger" style="color:black;">Submit</x-button1>

        {{-- <button type="submit" class="btn btn-outline-danger">Submit</button> --}}
    </form>
@endsection
