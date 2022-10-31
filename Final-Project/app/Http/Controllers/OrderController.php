<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $keywords = $request->keyword;
            $collection = Order::orderBy('created_at', 'ASC')->paginate(10);
            return view('page.order.list', compact('collection'));
        }
        return view('page.order.main');
    }
    public function checkout(){
        return view('page.checkout.main');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'card_name' => 'required',
            'card_number' => 'required',
            'expired_month' => 'required',
            'expired_year' => 'required',
            'cvv' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('card_name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('card_name'),
                ]);
            }elseif ($errors->has('card_number')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('card_number'),
                ]);
            }elseif ($errors->has('expired_month')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('expired_month'),
                ]);
            }elseif ($errors->has('expired_year')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('expired_year'),
                ]);
            }elseif ($errors->has('cvv')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('cvv'),
                ]);
            }elseif ($errors->has('country')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('country'),
                ]);
            }elseif ($errors->has('zip_code')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('zip_code'),
                ]);
            }
        }
        $order = new Order;
        $user = Auth::guard('web')->user()->id;
        $order->user_id = Auth::guard('web')->user()->id;
        $order->card_name = $request->card_name;
        $order->card_number = $request->card_number;
        $order->expired_month = $request->expired_month;
        $order->expired_year = $request->expired_year;
        $order->cvv = $request->cvv;
        $order->country = $request->country;
        $order->zip_code = $request->zip_code;
        $order->total = \Cart::session($user)->getTotal();
        $order->save();
        $collection = \Cart::session($user)->getContent();
        foreach ($collection as $item) {
            $orderDetail = new OrderDetail;
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $item->id;
            $orderDetail->qty = $item->quantity;
            $orderDetail->price = $item->price;
            $orderDetail->subtotal = $item->price * $item->quantity;
            $orderDetail->save();
        }
        \Cart::session($user)->clear();
        return response()->json([
            'alert' => 'success',
            'message' => 'Paymenet Success',
            'redirect' => 'reload',
            'route' => route('home'),
        ]);
    }
}
