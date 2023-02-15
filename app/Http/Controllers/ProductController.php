<?php

namespace App\Http\Controllers;

use App\Models\ProductManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //On crée une fonction public products
    public function viewAll()
    {
        $products = ProductManager::getAllProducts();
        return view('products')->with("products",$products);
    }
    public function view($id)
    {
        $product = ProductManager::getProductById($id);
        return view('details')->with('product',$product);
    }
    public function ajouter($id) {
        $panier = Session::get('panier',[]);
        if(array_key_exists($id, $panier))
        {
        $panier[$id]+=1;
        }
        else
        {
            $panier[$id]=1;
        }
    
        // Récupérer le panier de l'utilisateur depuis la sessi
    
        // Enregistrer le panier mis à jour dans la session
        session(['panier' => $panier]);
        Session::save();
    
        // Rediriger l'utilisateur vers la page du panier
        return redirect()->route('panier');
    }
    public function panier()
    {
        $cart = Session::get('panier', []);
        $products = [];
        $totalHorsTaxes = 0;
        $totalTTC = 0;
        $tva = 0;

        foreach ($cart as $productId) {
            $product = ProductManager::getProductById($productId);
            $price = $product->price;
            $quantity = 1;
            $totalPrice = $price * $quantity;
            $totalHorsTaxes += $totalPrice;
            $tva += $totalPrice * 0.2;
            $totalTTC = $totalHorsTaxes + $tva;

            $products[] = [
                'name' => $product->name,
                'price' => $price,
                'quantity' => $quantity,
                'total_price' => $totalPrice
            ];
        }

        return view('panier', [
            'products' => $products,
            'totalHorsTaxes' => $totalHorsTaxes,
            'totalTTC' => $totalTTC,
            'tva' => $tva
        ]);
    }
    
}


