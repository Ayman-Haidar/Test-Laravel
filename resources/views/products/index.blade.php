@extends('layouts.app')
@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">PRICE</th>
                <th scope="col">CATEGORY</th>
                <th scope="col">CREATED AT</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category }}</td>
                    <td> {{ $product->created_at }}</td>
                </tr>

            @endforeach

        </tbody>
    </table>
    {{ $products->links() }}
    <a href="{{ route('products.create') }}" class="btn btn-outline-primary">Create Product</a>

<form action="{{ route('products') }}" method="GET">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name...">
    <button type="submit">Search</button>
</form>
@endsection
