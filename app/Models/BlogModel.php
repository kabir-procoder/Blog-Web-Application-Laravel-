<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriesModel;
use Request;
use Auth;

class BlogModel extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecentPost()
    {
        return self::select('blogs.*', 'users.name as user_name', 'categories.name as category_name')
                    ->join('users', 'users.id', '=', 'blogs.user_id')
                    ->join('categories', 'categories.id', '=', 'blogs.category_id')
                    ->where('blogs.status', '=', 0)
                    ->where('blogs.isPublish', '=', 0)
                    ->where('blogs.isDelete', '=', 0)
                    ->orderBy('blogs.id', 'desc',)
                    ->limit(3)
                    ->get();
    }

    static public function getRelatedPost($category_id, $id)
    {
        return self::select('blogs.*', 'users.name as user_name', 'categories.name as category_name')
                    ->join('users', 'users.id', '=', 'blogs.user_id')
                    ->join('categories', 'categories.id', '=', 'blogs.category_id')
                    ->where('blogs.id', '!=', $id)
                    ->where('blogs.category_id', '=', $category_id)
                    ->where('blogs.status', '=', 0)
                    ->where('blogs.isPublish', '=', 0)
                    ->where('blogs.isDelete', '=', 0)
                    ->orderBy('blogs.id', 'desc',)
                    ->limit(4)
                    ->get();
    }

    static public function getRecordFront()
    {
        $return = self::select('blogs.*', 'users.name as user_name', 'categories.name as category_name')
                    ->join('users', 'users.id', '=', 'blogs.user_id')
                    ->join('categories', 'categories.id', '=', 'blogs.category_id');

                    if(!empty(Request::get('search')))
                    {
                        $return = $return->where('blogs.title', 'like', '%'.Request::get('search').'%');
                    }


        $return =   $return->where('blogs.status', '=', 0)
                    ->where('blogs.isPublish', '=', 0)
                    ->where('blogs.isDelete', '=', 0)
                    ->orderBy('blogs.id', 'desc',)
                    ->paginate(6);
        return $return;
    }

    static public function getRecordFrontCategory($category_id)
    {
        $return = self::select('blogs.*', 'users.name as user_name', 'categories.name as category_name')
                    ->join('users', 'users.id', '=', 'blogs.user_id')
                    ->join('categories', 'categories.id', '=', 'blogs.category_id')
                    ->where('blogs.category_id', '=', $category_id)
                    ->where('blogs.status', '=', 0)
                    ->where('blogs.isPublish', '=', 0)
                    ->where('blogs.isDelete', '=', 0)
                    ->orderBy('blogs.id', 'desc',)
                    ->paginate(6);
        return $return;
    }

    static public function getRecordSlug($slug)
    {
        return self::select('blogs.*', 'users.name as user_name', 'categories.name as category_name')
                    ->join('users', 'users.id', '=', 'blogs.user_id')
                    ->join('categories', 'categories.id', '=', 'blogs.category_id')
                    ->where('blogs.status', '=', 0)
                    ->where('blogs.isPublish', '=', 0)
                    ->where('blogs.isDelete', '=', 0)
                    ->where('blogs.slug', '=', $slug)
                    ->first();
    }

    static public function getAllBlogRecord()
    {
        $return = self::select('blogs.*', 'users.name as user_name', 'categories.name as category_name')
                    ->join('users', 'users.id', '=', 'blogs.user_id')
                    ->join('categories', 'categories.id', '=', 'blogs.category_id');

                    if(!empty(Auth::check()) && Auth::user()->isRole != 1)
                    {
                        $return = $return->where('blogs.user_id', '=', Auth::user()->id);
                    }

                    if(!empty(Request::get('id')))
                    {
                        $return = $return->where('blogs.id', '=', Request::get('id'));
                    }

                    if(!empty(Request::get('username')))
                    {
                        $return = $return->where('users.name', 'like', '%'.Request::get('username').'%');
                    }

                    if(!empty(Request::get('title')))
                    {
                        $return = $return->where('blogs.title', 'like', '%'.Request::get('title').'%');
                    }

                    $return = $return->where('blogs.isDelete', '=', 0)
                    ->orderBy('blogs.id', 'desc')
                    ->paginate(9);
        return $return;
    }

    static public function getAllBlogSoftdeleteRecord()
    {
        return self::select('blogs.*', 'users.name as user_name', 'categories.name as category_name')
                    ->join('users', 'users.id', '=', 'blogs.user_id')
                    ->join('categories', 'categories.id', '=', 'blogs.category_id')
                    ->where('blogs.isDelete', '=', 1)
                    ->orderBy('blogs.id', 'desc')
                    ->paginate(3);
    }

    static public function getCategory()
    {
        $return = CategoriesModel::select('categories.*')
                ->where('isDelete', '=', 0)
                ->get();
        return $return;
    }

    public function getTags()
    {
        return $this->hasMany(BlogTagsModel::class, 'blog_id');
    }

    public function getImage()
    {
        if(!empty($this->image) && file_exists('public/images/blog/'.$this->image)) 
        {
            return url('public/images/blog/'.$this->image);
        }
        else 
        {
            return "";
        }
    }

    public function getComments()
    {
        return $this->hasMany(BlogCommentModel::class, 'blog_id')->orderBy('blogcomments.id', 'desc');
    }

    public function getCommentsCount()
    {
        return $this->hasMany(BlogCommentModel::class, 'blog_id')->count();
    }



}
