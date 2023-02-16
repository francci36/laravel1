@extends('layout')
{{--ieieiie---}}
@section('content')
<div class="product-details">
        <div class="product-row">
             <div class="product-image">
                 <img src="/images/{{ $product->image }}" class="product-image">
             </div>
             <div class="product-info">
                 <h2>Voici {{ $product->name }}</h2>
                 <p>Description : {{ $product->description }}</p>
                 <p>Prix : {{ $product->price }}</p>
                 <br>
                 <a href="/ajout/{{ $product->id }}" class="product-link">Ajouter au panier</a>
             </div>
        </div>
    </div>
@endsection