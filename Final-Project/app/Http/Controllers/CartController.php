<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $user = Auth::guard('web')->user()->id;
        $output = '';
        $cek = \Cart::session($user)->isEmpty();
        $collection = \Cart::session($user)->getContent();
        $subtotal = \Cart::session($user)->getSubTotal();
        $total = \Cart::session($user)->getTotal();
        $total_qty = \Cart::session($user)->getTotalQuantity();
        if($cek == false){
            foreach ($collection as $item) {
                $output .= '
                <div class="top-cart-item mb-3" style="margin-top:-8%;">
                    <div class="top-cart-item-image">
                        <a href="javascript:;"><img src="'.$item->attributes['photo'].'" alt="" /></a>
                    </div>
                    <div class="top-cart-item-desc">
                        <div class="top-cart-item-desc-title">
                            <a href="javascript:;">'.$item->name.'</a>
                            <a href="javascript:;" style="float:right;" onclick="delete_cart(`'.route('cart.delete',$item->id).'`);"><i class="icon-trash"></i></a>
                            <span class="top-cart-item-price d-block">Rp '.number_format($item->price).'</span>
                        </div>
                        <div class="top-cart-item-quantity">x '.number_format($item->quantity).'</div>
                    </div>
                </div>
                ';
            }
        }else{
            $output .= '
            <div class="top-cart-item">
                <div class="top-cart-item-desc">
                    <div class="top-cart-item-desc-title">
                        <h5>Wah keranjang belanjaanmu kosong!</h5>
                        <span>Daripada dianggurin, isi saja dengan barang-barang menarik. Lihat-lihat dulu, siapa tahu ada yang kamu suka!</span>
                    </div>
                </div>
            </div>
            ';
        }
        return response()->json([
            'collection' => $output,
            'total_item' => $collection->count(),
            'subtotal' => number_format($subtotal),
            'total_qty' => number_format($total_qty),
            'total' => number_format($total),
        ]);
    }
    public function store(Request $request){
        $user = Auth::guard('web')->user()->id;
        $cek = \Cart::session($user)->get($request->id);
        $product = Product::find($request->id);
        if($cek){
            \Cart::session($user)->update($product->id, array(
                'quantity' => 1,
            ));
        }else{
            $item = array(
                'id' => $product->id,
                'name' => $product->title,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => array(
                    'photo' => asset('storage/' . $product->cover),
                ),
            );
            \Cart::session($user)->add($item);
        }
        return response()->json([
            'alert' => 'success',
            'message' => 'Item Added',
        ]);
    }
    public function delete($id){
        $user = Auth::guard('web')->user()->id;
        $cek = \Cart::session($user)->get($id);
        \Cart::session($user)->remove($cek->id);
        return response()->json([
            'alert' => 'success',
            'message' => 'Item Deleted',
        ]);
    }
}
