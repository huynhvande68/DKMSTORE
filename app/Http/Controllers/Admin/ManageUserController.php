<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestAdminAccount;
use App\Http\Requests\RequestAdminAccountEdit;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Illuminate\Support\Facades\Storage;
use App\User;
use Illuminate\Http\Request;
use App\Traits\UpLoadFileStorageTrait;
use Illuminate\Support\Facades\Hash;
use Exception;
use DB;
use Illuminate\Support\Facades\Route;


class ManageUserController extends Controller
{
    use UpLoadFileStorageTrait;
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $user = User::latest()->paginate(6);
        return view('admin.loadView.account.list',compact('user'));
    }

    public function create()
    {
        $roles = Role::select('id','name')->get();     
        return view('admin.loadView.account.create',compact('roles'));
    }

    public function store(RequestAdminAccount $request)
    {   
      
         try {
            DB::beginTransaction();
            $data =  $this->upStorageDontUser($request,'avatars','admin');
            $userdata = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)          
            ];

            if(!empty($data)){
                $userdata['avatar'] = $data['file_path'];
                $userdata['name_avatar'] = $data['file_name'];
             }
             $userss =  User::create($userdata);
             $userss->roles()->attach($request->roles);
             DB::commit();          
             return redirect()->route('admin.index')->with('success','Tạo tài khoản thành công');

        }
        catch(Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error',"message error system:".$e->getMessage().'Line :'.$e->getFile());
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        $role = Role::select('id','name')->get();     
        $roleuse = $user->roles;
        return view('admin.loadView.account.edit',compact('user','role','roleuse'));

    }

    public function update(RequestAdminAccountEdit $request , $id)
    {
        try {
            DB::beginTransaction();
            $user = User::find($id);
            if($user)
            {
              Storage::delete('public/admin/'.$user->name_avatar);
                $data =  $this->upStorageDontUser($request,'avatars','admin');
            $userdata = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)          
            ];

            if(!empty($data)){
                $userdata['avatar'] = $data['file_path'];
                $userdata['name_avatar'] = $data['file_name'];
             }
             $user->update($userdata);
             $user->roles()->sync($request->roles);
            }
            
             DB::commit();          
             return redirect()->route('admin.index')->with('success','Update thành công');

        }
        catch(Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error',"message error system:".$e->getMessage().'Line :'.$e->getFile());
        }
    }

    public function delete($id)
    {
        $users = User::find($id);      
        Storage::delete('public/admin/'.$users->name_avatar);
         $delete = $users->delete();
         if($delete ){
            $user = User::latest()->paginate(6);
             $cartComponent = view('admin.loadView.account.list_recusive',compact('user'))->render();
             return response()->json([
                 'code' => 200,
                 'main' => $cartComponent
             ],200);
         }
     
    }

    public function roleIndex()
    {
        $role = Role::get();
        return view('admin.loadView.role.roleindex',compact('role'));
    }

    public function roleCreate()
    {
        $permission = Permission::get();
        return view('admin.loadView.role.rolecreate',compact('permission'));
    }
    public function roleStore(Request $request)
    {
        if(empty($request->name_role) || empty($request->role_tags)){
            return redirect()->back()->with('error','không được bỏ trống các ô');
        }else{
           $role = Role::create([
                'name' =>$request->name_role,                
            ]);
            $role->roles_permission()->attach($request->role_tags);
            
            return redirect()->route('admin.role.user')->with('success','thêm chức năng thành công');
        }
    }

    public function roleEdit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $prs = $role->roles_permission;
        return view('admin.loadView.role.roleedit',compact('role','permission','prs'));
    }

    public function roleUpdate(Request $request , $id)
    {
        $role = Role::find($id);

        if($role){
            if(empty($request->name_role) || empty($request->role_tags)){
                return redirect()->back()->with('error','khong duoc bo trong cac o');
            }else{
               $role->update([
                    'name' =>$request->name_role,                
                ]);
                $role->roles_permission()->sync($request->role_tags);
                
                return redirect()->route('admin.role.user')->with('success','cập nhật chức năng thành công');
            }
        }else{
            return redirect()->back();
        }
    }

    public function roleDelete($id){
        $role = Role::find($id);
        $delete =  $role->delete();
         if($delete ){
            $role = Role::get();        
             $cartComponent = view('admin.loadView.role.roleindexrecusive',compact('role'))->render();
             return response()->json([
                 'code' => 200,
                 'main' => $cartComponent
             ],200);
         }
    }

    public function permission()
    {
        $route = [];
        $all = Route::getRoutes();
        $permi = Permission::select('name')->get();
        foreach($all as $item)
        {
            $all_name =  $item->getName();
            $pop = strpos($all_name, 'admin');
             if($pop !== false)
             {
                 array_push($route,$all_name);
             }            
        }
        
        return view('admin.loadView.role.permission',compact('route','permi'));
    }

    public function addPermission(Request $request)
    {
        if(empty($request->name_permission)){
            return redirect()->back()->with('error','khong duoc bo trong input');
        }else{
            $find = Permission::where('name','=',$request->name_permission);          
            if($find->count() <= 0){
                Permission::create([
                            'name' => $request->name_permission
                        ]);
                        return redirect()->back()->with('success','thành công');
            }else{
               
                return redirect()->back()->with('warning','bi trung');
            }
           
        }
    }

    public function addsPermission(Request $request)
    {
        if(empty($request->permission)){
            return redirect()->back()->with('error','khong duoc bo trong input');
        }else{
            $find = Permission::select('name')->get();        
            foreach($request->permission as $item)
            {
                
                if($find->contains('name',$item) === false)
                {
                    Permission::create([
                        'name' => $item
                    ]);
                }

            }
            return redirect()->back()->with('success','thành công');           
        }
    }
}
