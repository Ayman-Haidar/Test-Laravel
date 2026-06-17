@extends('layouts.app')
@section('content')
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        @error('name')
            {{ $message }}
        @enderror

        <label for="description">Description</label>
        <input type="text" name="description" id="description">
        @error('description')
            {{ $message }}
        @enderror

        <label for="price">Price</label>
        <input type="text" name="price" id="price">
        @error('price')
            {{ $message }}
        @enderror

        <select name="category">
            <option value="">Select Category</option>
            @foreach (App\CategoryEnum::cases() as $category)
                <option value="{{ $category->value }}">{{ $category->value }}</option>
            @endforeach
        </select>
        @error('category')
            {{ $message }}
        @enderror

        <button type="submit" class="btn btn-outline-danger">Submit</button>
    </form>
@endsection
