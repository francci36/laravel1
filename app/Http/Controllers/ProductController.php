<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //On crée une fonction public products
    public function viewAll()
    {
        //$products = ProductManager::getAllProducts();
        $products = Product::all();
        return view('products')->with("products",$products);
    }
    public function view($id)
    {
        $product = Product::findOrFail($id);
        return view('details')->with('product',$product);
       // $product = Product::findOrFail($id);
        //return view('details')->with('product',$product);
    }
    public function ajouter($id, Request $request) {
        $panier = $request->session()->get("panier",[]);
        
        $product = null;
        foreach($panier as $item){
            if($id == $item->id){
                $item->quantity++;
                $product = $item;
                break;
            }
        }
        if($product == null){
            $product = ProductManager::getProductById($id);
            $product->quantity = 1;
            array_push($panier,$product);
        }
        $request->session()->put('panier',$panier);
        Session::save();
        return redirect("/panier");
        //dd('$panier');
      /*$panier = Session::get('panier',[]);
        //if(array_key_exists($id, $panier))
        //{
       // $panier[$id]+=1;
        //}
        //else
        //{
           // $panier[$id]=1;
        //}
    
        // Récupérer le panier de l'utilisateur depuis la sessi
    
        // Enregistrer le panier mis à jour dans la session
        session(['panier' => $panier]);
        Session::save();
    
        // Rediriger l'utilisateur vers la page du panier
        return redirect()->route('panier');
        */
    }
    public function panier(Request $request)
    {
        $panier = $request->session()->get("panier",[]);
        $total = 0;
        foreach($panier as $item)
        {
            $totalligne = $item->quantity * $item->price;
            $item->total = $totalligne;
            $total += $totalligne;
        }
        return view("panier")->with("panier",$panier)->with("total",$total);
       /* $cart = Session::get('panier', []);
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
        ]);*/
    }
    public function validation() {
        // Supprimer le panier de la session
        Session::forget('panier');
          // Supprimer complètement le panier de la session
        $ordernumber = time();
        return  redirect('validation, $id');
    }
    
    public function creer()
{
    return view('creer');
}
public function save(ProductRequest $request){
    // on crée le produid dans la base de donné
    $product = Product::create($request->all());
    if($request->photo != null){
        $photo = $product->id.'.'.$request->photo->extension();
        $request->file('photo')->move(public_path('images'),$photo);
        $product->photo =$photo;
        $product->save();
    }
    return redirect('/');
} 
public function modify($id)

{
    $product = Product::findOrFail($id);
    return view("modify")->with("product",$product);
   
}
public function saveModify($id, ProductRequest $request)
{
    $product = Product::findOrFail($id);
    $product->nom = $request->input('nom');
    $product->description = $request->input('description');
    $product->prix = $request->input('prix');
    $product->tva = $request->input('tva');
    if($request->photo != null){
        $photo = $product->id.'.'.$request->photo->extension();
        $todelete = public_path('images')."/".$product->photo;
        unlink($todelete);
        $request->file('photo')->move(public_path('images'),$photo);
        $product->photo =$photo;

    }
    $product->save();
    return redirect("/");
}
public function delete($id)
{
    $product = Product::findOrFail($id);
    $todelete = public_path('images')."/".$product->photo;
    unlink($todelete);
    $product->delete();
    return redirect("/");
}

}
// relancer PHP artisan dans le dossier de travail
// ex: cd Docments, cd ecommerce, php artisan.
// ratatype logiciel pour taper sur clavier


