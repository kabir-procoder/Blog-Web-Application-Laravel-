<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriesModel;

class CategoriesController extends Controller
{
    public function categories()
    {
        $data['getRecord'] = CategoriesModel::getAllCategory();
        return view('admin.category.list', $data);
    }

    public function add_categories()
    {
        return view('admin.category.add');
    }

    public function add_categories_post(Request $request)
    {
        $insertData = request()->validate([
            'name'              => 'required',
            'slug'              => 'required',
            'title'             => 'required',
            'meta_title'        => 'required',
            'meta_description'  => 'required',
            'meta_keywords'     => 'required',
        ]);
        $insertData = new CategoriesModel;
        $insertData->name               = trim($request->name);
        $insertData->slug               = trim($request->slug);
        $insertData->title              = trim($request->title);
        $insertData->meta_title         = trim($request->meta_title);
        $insertData->meta_description   = trim($request->meta_description);
        $insertData->meta_keywords      = trim($request->meta_keywords);
        $insertData->status             = trim($request->status);
        $insertData->save();
        return redirect(url('admin/categories'))->with('success', 'Data Insert Successfully');
    }

    public function edit_categories($id)
    {
        $data['getEditRecord'] = CategoriesModel::getSingle($id);
        return view('admin.category.edit', $data);
    }

    public function update_categories($id, Request $request)
    {
        $updateData = request()->validate([
            'name'              => 'required',
            'slug'              => 'required',
            'title'             => 'required',
            'meta_title'        => 'required',
            'meta_description'  => 'required',
            'meta_keywords'     => 'required',
        ]);
        $updateData = CategoriesModel::getSingle($id);
        $updateData->name               = trim($request->name);
        $updateData->slug               = trim($request->slug);
        $updateData->title              = trim($request->title);
        $updateData->meta_title         = trim($request->meta_title);
        $updateData->meta_description   = trim($request->meta_description);
        $updateData->meta_keywords      = trim($request->meta_keywords);
        $updateData->status             = trim($request->status);
        $updateData->save();
        return redirect(url('admin/categories'))->with('success', 'Data Updated Successfully');
    }

    public function softdelete_list()
    {
        $data['getRecord'] = CategoriesModel::getAllSoftdelete();
        return view('admin.category.softdelete', $data);
    }

    public function softdelete($id)
    {
        $softDelete = CategoriesModel::getSingle($id);
        $softDelete->isDelete = 1;
        $softDelete->save();
        return redirect()->back()->with('warning', 'Data SoftDelete Successfully');
    }

    public function restore($id)
    {
        $restoreData = CategoriesModel::getSingle($id);
        $restoreData->isDelete = 0;
        $restoreData->save();
        return redirect()->back()->with('success', 'Data Restore Successfully');
    }

    public function delete($id)
    {
        $parmanentDelete = CategoriesModel::getSingle($id);
        $parmanentDelete->delete();
        return redirect()->back()->with('success', 'Data Parmanently Deleted Successfully');
    }


}
