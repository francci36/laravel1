<div class="panier">
    <h2>Récapitulatif du panier</h2>
    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Prix total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['price'] }} €</td>
                <td>{{ $product['quantity'] }}</td>
                <td>{{ $product['total_price'] }} €</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total hors taxes :</td>
                <td>{{ $totalHorsTaxes }} €</td>
            </tr>
            <tr>
                <td colspan="3">TVA (20%) :</td>
                <td>{{ $tva }} €</td>
            </tr>
            <tr>
                <td colspan="3">Total TTC :</td>
                <td>{{ $totalTTC }} €</td>
            </tr>
        </tfoot>
    </table>
    <a href="/validation/" class="">Valider la commande</a>
</div>