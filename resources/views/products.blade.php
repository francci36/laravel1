<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Products</title>
</head>

<body>
    <h1>LA BOUTIQUE</h1>
    <div class="contenant">
        @foreach ($products as $product)
        <div class="produit">
            <img src="images/{{ $product->image }}" alt="{{ $product->name }}">
            <span class="product-price">{{ $product->price }} € </span>
            <a href="/details/{{ $product->id }}" class="product-link">Voir</a>
            <p>This is user {{ $product->name }}</p>
        </div>
        @endforeach
    </div>
</body>

</html>