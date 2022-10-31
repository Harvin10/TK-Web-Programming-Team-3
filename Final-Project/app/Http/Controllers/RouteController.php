<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $keywords = $request->keyword;
            $collection = Product::where('title','LIKE','%'.$keywords.'%')
            ->orderBy('title', 'ASC')
            ->paginate(10);
            return view('page.home.list', compact('collection'));
        }
        return view('page.home.main');
    }
}
