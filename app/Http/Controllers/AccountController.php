<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Str;

class AccountController extends Controller
{

    // Users List
    public function user_list()
    {
        $data['getAdmin'] = User::allAdminRecord();
        $data['getRegister'] = User::allRegisterRecord();
        return view('admin.users.list', $data);
    }

    // User Edit
    public function user_edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        return view('admin.users.edit', $data);
    }

    // User Update
    public function user_update($id, Request $request)
    {
        $updateUser = User::getSingle($id);
        $updateUser->name = trim($request->name);
        $updateUser->email = trim($request->email);
        $updateUser->isRole = trim($request->isRole); 
        if(!empty($request->password)) {
            $updateUser->password = Hash::make($request->password);
        }
        if(!empty($request->file('image'))){
            if(!empty($updateUser->image) && file_exists('public/images/users/'.$updateUser->image))
            {
                unlink('public/images/users/'.$updateUser->image);
            }
            $file       = $request->file('image');
            $randomStr  = Str::random(10);
            $filename   = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('public/images/users', $filename);
            $updateUser->image = $filename; 
        }
        $updateUser->save();
        return redirect(url('admin/users'))->with('success', 'User hasbeen Updated Succssfully');
    }

    // User SoftDelete List
    public function softdelete_list()
    {
        $data['getSoftdelete'] = User::allSoftdeleteRecord();
        return view('admin.users.softdelete', $data);
    }

    // User Delete
    public function softdelete($id)
    {
        $softDelete = User::getSingle($id);
        $softDelete->isDelete = 1;
        $softDelete->save();
        return redirect()->back()->with('warning', 'Data Hasbeen Trash Successfully');

    }

    // User Restore
    public function restore($id)
    {
        $restoreUser = User::getSingle($id);
        $restoreUser->isDelete = 0;
        $restoreUser->save();
        return redirect()->back()->with('success', 'Data Restore Successfully');
    }

    // User Hard Delete
    public function delete($id)
    {
        $deleteUser = User::getSingle($id);
        $deleteUser->delete();
        return redirect()->back()->with('error', 'Data Delete Parmanent Successfully');

    }

    // Change Password
    public function ChangePassword()
    {
        return view('admin.users.change_password');
    }

    public function UpdatePassword(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password, $user->password)) 
        {
            if($request->new_password == $request->confirm_password) 
            {
                $user->password = Hash::make($request->new_password);
                $user->save();
                return redirect()->back()->with('success', 'Your Password successfully updated');
            }
            else
            {
                return redirect()->back()->with('error', 'confirm password is doesnot match to new password!');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Old Password does not match!');
        }
    }

    // Account Setting
    public function AccountSetting()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        return view('admin.users.account_setting', $data);
    }

    // Account Update
    public function AccountSettingUpdate($id, Request $request)
    {
        $UpdateAccount = User::getSingle(Auth::user()->id);
        $UpdateAccount->name    = trim($request->name);
        if(!empty($request->file('image'))){
            if(!empty($UpdateAccount->image) && file_exists('public/images/users/'.$UpdateAccount->image))
            {
                unlink('public/images/users/'.$UpdateAccount->image);
            }
            $file       = $request->file('image');
            $randomStr  = Str::random(10);
            $filename   = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('public/images/users', $filename);
            $UpdateAccount->image = $filename; 
        }
        $UpdateAccount->save();
        return redirect()->back()->with('success', 'Dtata Updated Successfully!');
    }

    
}
