<?php

// namespace App\Http\Controllers\admin;

// use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;

// use Hash;
// use Session;
// use App\Models\User;
// use Illuminate\Support\Facades\Auth;

// class UsersController extends Controller
// {

//      public function index()
//     {
//         $users = User::latest()->paginate(10);

//         return view('admin.user.index', compact('users'));
//     }

// 	public function create()
//     {
//         return view('admin.user.create');
//     }

// 	public function store(User $user, Request $request)
//     {
//         $request->validate([
//             'name'         =>   'required',
//             'email'         =>   'required'

//         ]);

//         $data = $request->all();

//         User::create([
//             'name'  =>  $data['name'],
//             'email' =>  $data['email']

//         ]);

//         return redirect('admin/user/create')->with('success', 'Record saved successfully.');
//     }

// 	public function show(User $user)
//     {
//         return view('admin.user.show', [
//             'user' => $user
//         ]);
//     }

// 	public function edit(User $user)
//     {
//         return view('admin.user.edit', [
//             'user' => $user
//         ]);
//     }

// 	public function update(User $user, Request $request)
//     {

// 		$user = User::find($user->id);

//         $user->name = $request->name;
// 		$user->email = $request->email;

//           $user->save();

//         //$user->update($request->validated());

//       //  return redirect()->route('admin.user.index')
//         //    ->withSuccess(__('User updated successfully.'));

// 			 return redirect('admin/user/list')->with('success', 'Record updated successfully.');
//     }



// }
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}

