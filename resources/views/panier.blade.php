@extends('layout')
@section("content")
<div class="panier">
    <ul>
        
        @foreach($panier as $product)
        <li>
        {{ $product->name}}-
        x{{ $product->price}} €-
        {{ $product->quantity}}-
        {{ $product->total}} €
        
        </li>
        @endforeach
        <p>Total:{{$total}}€</p>
        
    </ul>
</div>
@endsection
