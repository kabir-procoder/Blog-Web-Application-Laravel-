<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeoModel;

class SeoController extends Controller
{
    public function seo()
    {
        $data['getRecord'] = SeoModel::getAllRecord();
        return view('admin.seo.list', $data);
    }

    public function seo_update(Request $request)
    {
        if($request->add_or_update == "Add") {
            $InsertUpdate = request()->validate([
                'slug'              => 'required',
                'title'             => 'required',
                'description'       => 'required',
                'meta_title'        => 'required',
                'meta_description'  => 'required',
                'meta_keywords'     => 'required'
            ]);
            $InsertUpdate = new SeoModel;
        } else {
            $InsertUpdate = SeoModel::find($request->id);
        }
        $InsertUpdate->slug             = trim($request->slug);
        $InsertUpdate->title            = trim($request->title);
        $InsertUpdate->description      = trim($request->description);
        $InsertUpdate->meta_title       = trim($request->meta_title);
        $InsertUpdate->meta_description = trim($request->meta_description);
        $InsertUpdate->meta_keywords    = trim($request->meta_keywords);
        $InsertUpdate->save();
        return redirect()->back()->with('success', 'seo data updated successfully');

    }
}
