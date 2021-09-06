<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Cart;
use App\Models\Order;

class ProductsController extends Controller
{
    public function index()
    {
        //Getting all the products that I created in my seeder, from my database
        $products = Product::all();

        return view('index', compact('products', $products));
    }

    public function addToCart(Request $request, $id) {
        // Trying to get product from the database with the eloquent method 'find'
        $product = Product::find($id);
        /* Check if cart already exists.
        If the cart does exist it wil retrieve it.
        If the cart does not exist, it will be null */
        //session = Sessions are used to store information about the user across the requests.
        //request = The Request facade will grant you access to the current request that is bound in the container. 
        $cart =  new Cart($request);
        $cart->add($product, $product->id);
        // Add products to cart
        $request->session()->put('cart', $cart);
        return redirect()->route('home');
    }

    public function getReduceByOne(Request $request, $id) {
        $cart = new Cart($request);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            $request->session()->put('cart', $cart);
        } else {
            $request->session()->forget('cart');
        }
        return redirect()->route('product.cart');
    }

    public function getAddByOne(Request $request, $id) {
        $cart = new Cart($request);
        $cart->addByOne($id);
        return redirect()->route('product.cart');
    }

    public function getRemoveItem(Request $request, $id) {
        $cart = new Cart($request);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            $request->session()->put('cart', $cart);
        } else {
            $request->session()->forget('cart');
        }
        return redirect()->route('product.cart');
    }

    public function getCart(Request $request) {
        if (!$request->session()->has('cart')) {
            return view('cart', ['products' => null]);
        }
        $cart =  new Cart($request);
        return view('cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout (Request $request) {
        if (!$request->session()->has('cart')) {
            return view('product.cart');
        }
        $cart = new Cart($request);
        $total = $cart->totalPrice;
        return view('shopping-cart' , ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function postCheckout(Request $request) {
        $hasCart = $request->session()->has('cart');
        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        if ( ! $hasCart)
        {
            return redirect()->view('shopping-cart');
        }

        $order = new Order();
        //serialize = a way to store the values in an object into a text string format(similar to JSON)
        $order->cart = serialize($cart);
        $order->address = $request->input('address');
        $order->name = $request->input('name');
        $order->save();

        $request->session()->forget('cart');

        return redirect()->route('home')->with($request->session()->flash('success', 'Payment successful!'));
    }

    public function filter(Request $request) {

        // Getting all products where category_id == input category
        $products = Product::where('id', $request->input('categories'))->get();
        return view('index', compact('products', $products));
    }
}
