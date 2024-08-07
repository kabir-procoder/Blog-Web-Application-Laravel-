<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoModel extends Model
{
    use HasFactory;

    protected $table = 'seo';

    static public function getAllRecord()
    {
        return self::get();
    }
}