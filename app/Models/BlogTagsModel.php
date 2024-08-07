<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTagsModel extends Model
{
    use HasFactory;

    protected $table = 'blog_tags';

    static public function insertDeleteTags($blog_id, $tags)
    {
        BlogTagsModel::where('blog_id', '=', '$blog_id')->delete();

        if(!empty($tags))
        {
            $tagsarray = explode(",", $tags);
            foreach($tagsarray as $tag)
            {
                $insert = new BlogTagsModel;
                $insert->blog_id = $blog_id;
                $insert->name = trim($tag);
                $insert->save();
            }
        }
    }

}
