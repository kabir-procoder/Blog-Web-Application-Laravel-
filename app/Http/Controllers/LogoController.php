<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogoModel;
use Str;

class LogoController extends Controller
{
    
    public function logo()
    {
        $data['getRecord'] = LogoModel::all();        
        return view('admin.logo.list', $data);
    }

    public function logo_update(Request $request)
    {
        if($request->add_to_update == 'Add') {
            $insertData = new LogoModel;
        } else {
            $insertData = LogoModel::find($request->id);
        }
        if(!empty($request->file('favicon'))){
            if(!empty($insertData->favicon) && file_exists('public/images/logo/'.$insertData->favicon))
            {
                unlink('public/images/logo/'.$insertData->favicon);
            }
            $file       = $request->file('favicon');
            $randomStr  = Str::random(10);
            $filename   = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('public/images/logo', $filename);
            $insertData->favicon = $filename; 
        }
        if(!empty($request->file('mainlogo'))){
            if(!empty($insertData->mainlogo) && file_exists('public/images/logo/'.$insertData->mainlogo))
            {
                unlink('public/images/logo/'.$insertData->mainlogo);
            }
            $file       = $request->file('mainlogo');
            $randomStr  = Str::random(10);
            $filename   = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('public/images/logo', $filename);
            $insertData->mainlogo = $filename; 
        }
        $insertData->save();
        return redirect()->back()->with('success', 'Updated Data Successfully');
    }

}
