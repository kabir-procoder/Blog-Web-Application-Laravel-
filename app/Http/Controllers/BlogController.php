<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Models\BlogTagsModel;
use Auth;
use Str;

class BlogController extends Controller
{
    public function blog()
    {
        $data['getRecord'] = BlogModel::getAllBlogRecord();
        return view('admin.blog.list', $data);
    }

    public function add_blog()
    {
        $data['categoryRecord'] = BlogModel::getCategory();
        return view('admin.blog.add', $data);
    }

    public function insert_blog(Request $request)
    {
        $InsertBlog = request()->validate([
            'title'             => 'required',
            'description'       => 'required',
            'meta_description'  => 'required',
            'meta_description'  => 'required',
        ]);
        $InsertBlog = new BlogModel;
        $InsertBlog->user_id            = Auth::user()->id;
        $InsertBlog->title              = trim($request->title);
        $InsertBlog->category_id        = trim($request->category_id);
        $InsertBlog->description        = trim($request->description);
        $InsertBlog->meta_description   = trim($request->meta_description);
        $InsertBlog->meta_keywords      = trim($request->meta_keywords);
        $InsertBlog->isPublish          = trim($request->isPublish);
        $InsertBlog->status             = trim($request->status);

        $slug = Str::slug($request->title);
        $checkSlug = BlogModel::where('slug', '=', $slug)->first();
        if(!empty($checkSlug)) 
        {
            $dbslug = $slug.'-'.$InsertBlog->id;
        } 
        else 
        {
            $dbslug = $slug;
        }
        $InsertBlog->slug = $dbslug;

        if(!empty($request->file('image'))){
            $file       = $request->file('image');
            $randomStr  = Str::random(10);
            $filename   = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('public/images/blog', $filename);
            $InsertBlog->image = $filename; 
        }
        $InsertBlog->save();
        BlogTagsModel::insertDeleteTags($InsertBlog->id, $request->tags);
        return redirect(url('admin/blog'))->with('success', 'Data Insert Successfully');
    }

    public function edit_blog($id)
    {
        $data['getRecord'] = BlogModel::getSingle($id);
        $data['categoryRecord'] = BlogModel::getCategory();
        return view('admin.blog.edit', $data);
    }

    public function update_blog($id, Request $request)
    {
        $updateBlog = BlogModel::getSingle($id);
        $updateBlog->title              = trim($request->title);
        $updateBlog->category_id        = trim($request->category_id);
        $updateBlog->description        = trim($request->description);
        $updateBlog->meta_description   = trim($request->meta_description);
        $updateBlog->meta_keywords      = trim($request->meta_keywords);
        $updateBlog->isPublish          = trim($request->isPublish);
        $updateBlog->status             = trim($request->status);
        if(!empty($request->file('image'))){
            if(!empty($updateBlog->image) && file_exists('public/images/blog/'.$updateBlog->image))
            {
                unlink('public/images/blog/'.$updateBlog->image);
            }
            $file       = $request->file('image');
            $randomStr  = Str::random(10);
            $filename   = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('public/images/blog', $filename);
            $updateBlog->image = $filename; 
        }
        $updateBlog->save();
        BlogTagsModel::insertDeleteTags($updateBlog->id, $request->tags);
        return redirect(url('admin/blog'))->with('success', 'Data Updated Successfully');
    }

    public function trash_list()
    {
        $data['getRecord'] = BlogModel::getAllBlogSoftdeleteRecord();
        return view('admin.blog.softdelete', $data);
    }

    public function softdelete($id)
    {
        $softDelete = BlogModel::getSingle($id);
        $softDelete->isDelete = 1;
        $softDelete->save();
        return redirect(url('admin/blog'))->with('warning', 'Data trash successfully!');
    }

    public function restore($id)
    {
        $restoreData = BlogModel::getSingle($id);
        $restoreData->isDelete = 0;
        $restoreData->save();
        return redirect(url('admin/blog/softdelete/list'))->with('success', 'Data Restore Successfully');
    }

    public function delete($id)
    {
        $deleteData = BlogModel::getSingle($id);
        if(!empty($deleteData->image) && file_exists('public/images/blog/'.$deleteData->image))
            {
                unlink('public/images/blog/'.$deleteData->image);
            }
        $deleteData->delete();
        return redirect()->back()->with('success', 'Data Deleted Successfully');
    }




}
