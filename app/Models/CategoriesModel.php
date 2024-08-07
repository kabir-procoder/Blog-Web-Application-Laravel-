<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesModel extends Model
{
    use HasFactory;

    protected $table = 'categories';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getAllCategory()
    {
        $return = self::select('categories.*')
                ->where('isDelete', '=', 0)
                ->orderBy('id', 'desc')
                ->paginate(3);
        return $return;
    }

    static public function getAllSoftdelete()
    {
        $return = self::select('categories.*')
                ->where('isDelete', '=', 1)
                ->orderBy('id', 'desc')
                ->paginate(3);
        return $return;
    }

    static public function getHomeCategory()
    {
        return self::select('categories.*')
                ->where('isDelete', '=', 0)
                ->orderBy('id', 'desc')
                ->get();
    }

    public function totalBlog()
    {
        return $this->hasMany(BlogModel::class, 'category_id')
                    ->where('blogs.status', '=', 0)
                    ->where('blogs.isPublish', '=', 0)
                    ->where('blogs.isDelete', '=', 0)
                    ->count();
    }

    static public function getCategoryMenu()
    {
        return self::select('categories.*')
                ->where('status', '=', 0)
                ->where('isDelete', '=', 0)
                ->get();
    }

    static public function getSlug($slug)
    {
        return self::select('categories.*')
                ->where('slug', '=', $slug)
                ->where('status', '=', 0)
                ->where('isDelete', '=', 0)
                ->first();
    }



}
