<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cart;
    protected $product;
    protected $cartProduct, $order;

    public function __construct(Product $product, Cart $cart, CartProduct $cartProduct, Order $order)
    {
        $this->order = $order;
        $this->product = $product;
        $this->cart = $cart;
        $this->cartProduct = $cartProduct;
    }
    public function index()
    {
        $cart = $this->cart->firstOrCreateBy(auth()->user()->id)->load('products');
        $subtotal = $cart->products->sum(function ($item) {
            return $item->product->price * $item->product_quantity;
        });
        return view('cart.index', compact('cart'));
    }
    public function store(Request $request)
    {
        $product = $this->product->find($request->product_id);
        $cart = $this->cart->firstOrCreate(['user_id' => auth()->user()->id])->load('products');
        $cartProduct = $this->cartProduct->getBy($cart->id, $product->id);

        if ($cartProduct) {
            $quantity = $cartProduct->product_quantity;
            $cartProduct->update(['product_quantity' => $quantity + $request->product_quantity]);
        } else {
            $dataCreate = [
                'cart_id' => $cart->id,
                'product_quantity' => $request->product_quantity ?? 1,
                'product_price' => $request->product_price ?? $product->price,
                'product_id' => $request->product_id,
            ];
            $this->cartProduct->create($dataCreate);
        }
        return redirect()->route('cart.index')->with('success', 'Thêm mới thành công');
    }   


    public function destroy($productId)
    {
        $cart = $this->cart->firstOrCreateBy(auth()->user()->id);
        $cartProduct = $this->cartProduct->getBy($cart->id, $productId);

        if ($cartProduct) {
            $cartProduct->delete();
        }

        return back()->with('message', 'Product removed from cart successfully');
    }

    public function checkout()
    {
        $cart = $this->cart->firstOrCreateBy(auth()->user()->id)->load('products');

        return view('checkout.index', compact('cart'));
    }

    public function processCheckout(Request $request)
    {
        $dataCreate = $request->all();
        $dataCreate['user_id'] = auth()->user()->id;
        $dataCreate['status'] = 'pending';
        $this->order->create($dataCreate);
        $cart = $this->cart->firstOrCreateBy(auth()->user()->id);
        $cart->products()->delete();
        return view('checkout.show');
    }

}
