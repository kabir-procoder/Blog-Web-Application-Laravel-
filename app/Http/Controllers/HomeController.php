<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Models\CategoriesModel;
use App\Models\BlogCommentModel;
use App\Models\BlogCommentReplyModel;
use Auth;


class HomeController extends Controller
{
    // Landing Page
    public function home()
    {
        $data['getRecord'] = BlogModel::getRecordFront();
        return view('home', $data);
    }

    // About Page
    public function about()
    {
        return view('about');
    }

    // Class Team
    public function classes()
    {
        return view('class');
    }

    // Team Page
    public function team()
    {
        return view('team');
    }

    // Gattery Page
    public function gallery()
    {
        return view('gallery');
    }

    // Blog Page
    public function blog()
    {
        $data['getRecord'] = BlogModel::getRecordFront();
        return view('blog', $data);
    }
    // Blog Details
    public function blogDetails($slug)
    {
        $getCategory = CategoriesModel::getSlug($slug);
        if(!empty($getCategory))
        {
            $data['getRecord'] = BlogModel::getRecordFrontCategory($getCategory->id);
            return view('blog', $data);
        }
        else
        {
            $getRecord = BlogModel::getRecordSlug($slug);
            if (!empty($getRecord)) 
            {
                $data['getCategory'] = CategoriesModel::getHomeCategory();
                $data['getRecentPost'] = BlogModel::getRecentPost();
                $data['getRelatedPost'] = BlogModel::getRelatedPost($getRecord->category_id, $getRecord->id);
                $data['getRecord'] = $getRecord;
                return view('blog_details', $data);
            }
            else
            {
                abort(404);
            }
        }  
    }

    public function BlogCommentSubmit(Request $request)
    {
        $InsertComment = new BlogCommentModel;
        $InsertComment->user_id = Auth::user()->id;
        $InsertComment->blog_id = $request->blog_id;
        $InsertComment->comment = $request->comment;
        $InsertComment->save();
        return redirect()->back()->with('success', 'post your comment successfully!');
    }

    public function BlogCommentReplySubmit(Request $request)
    {
        $InsertComment = new BlogCommentReplyModel;
        $InsertComment->user_id = Auth::user()->id;
        $InsertComment->comment_id = $request->comment_id;
        $InsertComment->comment = $request->comment;
        $InsertComment->save();
        return redirect()->back()->with('success', 'post your reply successfully!');
    }

    // Contact Page
    public function contact()
    {
        return view('contactus');
    }



}
