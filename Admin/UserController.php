<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection\paginate;
use App\Http\Controllers\Controller;
use App\User;
use DateTime;
use App\Http\Controllers\Hash;
use App\Http\Requests\UsersRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(){
    	$show = User::paginate(5);
    	return view('Admin.User.list',compact('show'));
    }

    public function getCreat(){
    	return view('Admin.User.add');
    }

    public function postCreat(UsersRequest $request){
    	$user = new User();
    	$user->name = $request->name;
    	$user->slug = str_slug($request->name, '-');
    	$user->phone_number = $request->phone_number;
    	$user->year = $request->year;
    	$user->email = $request->email;
        $user->email_verified_at = $request->email_verified_at;
    	$user->password = bcrypt($request->password);
    	$user->password_verified_at = bcrypt($request->password_verified_at);
    	$user->type = $request->type;
    	if ($request->hasFile('avatar')) {
            $fileExtension = '.'.$request->avatar->extension(); 
            $imageName = 'img'.uniqid().$fileExtension;
            $request->file('avatar')->storeAs('', $imageName, 'avatar_upload');
            $user->avatar = $imageName;
        }
    	$user->save();
    	return redirect()->back()->with('success','Add success user');
    }

    public function getUpdate($id){
        $user = User::findOrFail($id);
        return view('Admin.User.edit', compact('user'));
    }

    public function postUpdate(UsersRequest $request, $id){
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->slug = str_slug($request->name, '-');
        $user->phone_number = $request->phone_number;
        $user->year = $request->year;
        $user->email = $request->email;
        $user->email_verified_at = $request->email_verified_at;
        $user->password = bcrypt($request->password);
        $user->password_verified_at = bcrypt($request->password_verified_at);
        $user->type = $request->type;
        $old_images = $request->old_images;

        if ($request->hasFile('avatar')) {
            $fileExtension = '.'.$request->avatar->extension();             
            $imageName = 'img'.uniqid().$fileExtension; 
            $request->file('avatar')->move(public_path('images'), $imageName);
            $user->avatar = $imageName;
            if (trim($old_images) != "" && file_exists(public_path('images/') . $old_images)) {
                unlink(public_path('images/') . $old_images);
            }
        } else {
            $user->avatar = $old_images;
        }
        $user->save();
        return redirect()->back()->with('success','Edit success user');
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success','Delete Seccess user');
    }

    public function search(Request $request){
        $keyword = $request->input('keyword');
        /*dd($keyword);*/
        $user = User::where('name','like',"%$keyword%")
        ->orWhere('email', 'like', "%$keyword%")->paginate(5);
        return view('Admin.User.search',compact('user','keyword'));
    }
}
