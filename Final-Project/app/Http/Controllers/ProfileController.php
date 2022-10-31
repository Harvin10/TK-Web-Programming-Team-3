<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
class ProfileController extends Controller
{
    public function index(Request $request)
    {
      $users = DB::select('select * from users where id = ?', [Auth::guard('web')->user()->id]);
        if ($request->ajax()) {
            $keywords = $request->keyword;
            $collection = Product::where('title','LIKE','%'.$keywords.'%')
            ->orderBy('title', 'ASC')
            ->paginate(10);
            return view('page.game.list', compact('collection'));
        }
        return view('page.profile.main',['users'=>$users]);
    }
    public function update(Request $request)
    {
      $password = Hash::make($request->password);
      DB::update('UPDATE users SET username=?, name=?, password=? where id = ?', [$request->username,$request->name,Hash::make($request->password),Auth::guard('web')->user()->id]);

      $users = DB::select('select * from users where id = ?', [Auth::guard('web')->user()->id]);
      return view('page.profile.main',['users'=>$users]);
    }
    public function friend(Request $request)
    {
      
      $users = DB::select('select * from users where id = ?', [Auth::guard('web')->user()->id]);
      $income = DB::select('select friend_request.id,friend_request.user_id1, users.username,users.name from friend_request JOIN users ON users.id=friend_request.user_id1 where user_id2 = ?', [Auth::guard('web')->user()->id]);
      $friend = DB::select('select friend.id, users.username,users.name from friend JOIN users ON users.id=friend.user_id2 where user_id1 = ?', [Auth::guard('web')->user()->id]);
      $pending = DB::select('select friend_request.id, users.username,users.name from friend_request JOIN users ON users.id=friend_request.user_id2 where user_id1 = ?', [Auth::guard('web')->user()->id]);
      
      return view('page.profile.friend',['users'=>$users,'income'=>$income,'friend'=>$friend,'pending'=>$pending]);
    }
    public function add(Request $request)
    {
      $req = DB::select('select * from users where username = ?', [$request->username]);
      if($req){
       // print_r($request->username);
        DB::insert('INSERT INTO friend_request (user_id1,user_id2) values(?,?)', [Auth::guard('web')->user()->id,$req[0]->id]);
      }
      
      $users = DB::select('select * from users where id = ?', [Auth::guard('web')->user()->id]);
      $income = DB::select('select friend_request.id,friend_request.user_id1, users.username,users.name from friend_request JOIN users ON users.id=friend_request.user_id1 where user_id2 = ?', [Auth::guard('web')->user()->id]);
      $friend = DB::select('select friend.id, users.username,users.name from friend JOIN users ON users.id=friend.user_id2 where user_id1 = ?', [Auth::guard('web')->user()->id]);
      $pending = DB::select('select friend_request.id, users.username,users.name from friend_request JOIN users ON users.id=friend_request.user_id2 where user_id1 = ?', [Auth::guard('web')->user()->id]);
      
      return view('page.profile.friend',['users'=>$users,'income'=>$income,'friend'=>$friend,'pending'=>$pending]);
    }
    public function cancel(Request $request)
    {
      DB::delete('DELETE FROM friend_request where id = ? ', [$request->id]);
      
      $users = DB::select('select * from users where id = ?', [Auth::guard('web')->user()->id]);
      $income = DB::select('select friend_request.id,friend_request.user_id1, users.username,users.name from friend_request JOIN users ON users.id=friend_request.user_id1 where user_id2 = ?', [Auth::guard('web')->user()->id]);
      $friend = DB::select('select friend.id, users.username,users.name from friend JOIN users ON users.id=friend.user_id2 where user_id1 = ?', [Auth::guard('web')->user()->id]);
      $pending = DB::select('select friend_request.id, users.username,users.name from friend_request JOIN users ON users.id=friend_request.user_id2 where user_id1 = ?', [Auth::guard('web')->user()->id]);
      
      return view('page.profile.friend',['users'=>$users,'income'=>$income,'friend'=>$friend,'pending'=>$pending]);
    }
    public function decline(Request $request)
    {
      DB::delete('DELETE FROM friend_request where id = ? ', [$request->id]);
      
      $users = DB::select('select * from users where id = ?', [Auth::guard('web')->user()->id]);
      $income = DB::select('select friend_request.id,friend_request.user_id1, users.username,users.name from friend_request JOIN users ON users.id=friend_request.user_id1 where user_id2 = ?', [Auth::guard('web')->user()->id]);
      $friend = DB::select('select friend.id, users.username,users.name from friend JOIN users ON users.id=friend.user_id2 where user_id1 = ?', [Auth::guard('web')->user()->id]);
      $pending = DB::select('select friend_request.id, users.username,users.name from friend_request JOIN users ON users.id=friend_request.user_id2 where user_id1 = ?', [Auth::guard('web')->user()->id]);
      
      return view('page.profile.friend',['users'=>$users,'income'=>$income,'friend'=>$friend,'pending'=>$pending]);
    }
    public function accept(Request $request)
    {
      DB::insert('INSERT INTO friend (user_id2,user_id1) values(?,?)', [$request->user_id1,Auth::guard('web')->user()->id]);
      DB::insert('INSERT INTO friend (user_id1,user_id2) values(?,?)', [$request->user_id1,Auth::guard('web')->user()->id]);
      
      DB::delete('DELETE FROM friend_request where id = ?', [$request->user_id1]);
      
      $users = DB::select('select * from users where id = ?', [Auth::guard('web')->user()->id]);
      $income = DB::select('select friend_request.id,friend_request.user_id1, users.username,users.name from friend_request JOIN users ON users.id=friend_request.user_id1 where user_id2 = ?', [Auth::guard('web')->user()->id]);
      $friend = DB::select('select friend.id, users.username,users.name from friend JOIN users ON users.id=friend.user_id2 where user_id1 = ?', [Auth::guard('web')->user()->id]);
      $pending = DB::select('select friend_request.id, users.username,users.name from friend_request JOIN users ON users.id=friend_request.user_id2 where user_id1 = ?', [Auth::guard('web')->user()->id]);
      
      return view('page.profile.friend',['users'=>$users,'income'=>$income,'friend'=>$friend,'pending'=>$pending]);
    }
    
}
