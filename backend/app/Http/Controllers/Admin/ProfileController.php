<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Traits\UploadImage;


class ProfileController extends Controller
{
    use UploadImage;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view('setting.profile',['user'=>$user]);
    }


    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email' => 'required|email|unique:users,email,'.$user->id.',id',
            'profile' => 'required'
        ]);

        if($request->password != null){
            $request->validate([
                'password' => 'required|confirmed'
            ]);
            $validated['password'] = bcrypt($request->password);
        }

        if($request->hasFile('profile')){
            if($name = $this->saveImage($request->profile)){
                $validated['profile'] = $name;
                $user['profile'] = $validated['profile'];
            }
        }

        // $user->update($validated); 

        return redirect()->back()->withSuccess('User updated !!!');
    }
}
