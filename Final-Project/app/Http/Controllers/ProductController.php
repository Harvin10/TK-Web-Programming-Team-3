<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use DB;
class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keyword;
            $collection = Product::where('title','LIKE','%'.$keywords.'%')
            ->orderBy('title', 'ASC')
            ->paginate(10);
            return view('page.product.list', compact('collection'));
        }
        $users = DB::select('select products.*,product_category.title as A from products INNER JOIN product_category ON products.product_category_id=product_category.id');
        return view('page.product.main',['collection' => $users]);
    }
    public function category(Request $request)
    {
        
        $users = DB::select('select * from product_category');
        return view('page.product.main_category',['category'=>$users]);
    }
    public function input_category(Request $request)
    {
        
        return view('page.product.input_category');
    }
    
    public function store_category(Request $request)
    {
        DB::insert('INSERT INTO product_category (title,slug) values(?,?)', [$request->tittle,$request->slug]);
      
      $users = DB::select('select * from product_category');
        return view('page.product.main_category',['category'=>$users]);
    }
    public function create()
    {
        $category = ProductCategory::get();
        return view('page.product.input', ['data' => new Product, 'category' => $category]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'title' => 'required',
            'price' => 'required|max:20',
            'description' => 'required',
            'cover' => 'required|image|max:100000',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('category')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('category'),
                ]);
            }elseif ($errors->has('title')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('title'),
                ]);
            }elseif ($errors->has('description')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description'),
                ]);
            }
        }
        print_r($request->cover);
        $img = request()->file('cover');
        $destinationPath = 'uploads';
        $img->move($destinationPath,$img->getClientOriginalName());
        DB::insert('INSERT INTO products (product_category_id,title,price,cover,descr) values(?,?,?,?,?)', [$request->category,$request->title,$request->price,$request->cover->getClientOriginalName(),$request->description]);

        return redirect('products');
    }
    public function show(Product $product)
    {
        //
    }
    public function edit(Product $product)
    {
        $category = ProductCategory::get();
        return view('page.product.input', ['data' => $product, 'category' => $category]);
    }
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'title' => 'required',
            'price' => 'required|max:20',
            'developer' => 'required',
            'publisher' => 'required',
            'description' => 'required',
            'cover' => 'max:100',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('category')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('category'),
                ]);
            }elseif ($errors->has('title')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('title'),
                ]);
            }elseif ($errors->has('price')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('price'),
                ]);
            }elseif ($errors->has('developer')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('developer'),
                ]);
            }elseif ($errors->has('publisher')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('publisher'),
                ]);
            }elseif ($errors->has('description')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description'),
                ]);
            }elseif ($errors->has('cover')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('cover'),
                ]);
            }
        }
        $product->product_category_id = $request->category;
        $product->title = Str::title($request->title);
        $product->slug = Str::slug($request->title);
        $product->price = Str::remove(',',$request->price);
        $product->desc = $request->description;
        $product->developer = $request->developer;
        $product->publisher = $request->publisher;
        $product->adult_content = $request->adult??'n';
        if(request()->file('cover')){
            Storage::delete($product->cover);
            $cover = request()->file('cover')->store("cover");
            $product->cover = $cover;
        }
        if(request()->file('trailer')){
            Storage::delete($product->trailer);
            $trailer = request()->file('trailer')->store("trailer");
            $product->trailer = $trailer;
        }
        $product->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Product Updated',
        ]);
    }
    public function destroy(Product $product)
    {
        Storage::delete($product->cover);
        Storage::delete($product->trailer);
        $product->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Product Deleted',
        ]);
    }
    public function category_destroy(ProductCategory $category)
    {
        Storage::delete($category->cover);
        Storage::delete($category->trailer);
        $category->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Category Deleted',
        ]);
    }
}
