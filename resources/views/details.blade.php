@extends('layout')
{{--ieieiie---}}
@section('content')
<div class="product-details">
        <div class="product-row">
             <div class="product-image">
                 <img src="/images/{{ $product->photo }}" class="product-image">
             </div>
             <div class="product-info">
                 <h2>Voici {{ $product->name }}</h2>
                 <p>Description : {{ $product->description }}</p>
                 <p>Prix : {{ $product->prix }}</p>
                 <br>
                 <a href="/ajout/{{ $product->id }}" class="product-link">Ajouter au panier</a>
                    <br>
                 <a href="/product/modify/{{ $product->id }}" class="product-link">Modifier le produit</a>
                 <form action="/product/delete/{{ $product->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">supprimer</button>
                 </form>
             </div>
        </div>
    </div>
@endsection