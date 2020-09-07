<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";
    protected $primaryKey = "id";


    protected $fillable = [
        'article_id',
        'user_id',
        'status',
        'comment'
    ];
    protected $dates = [
        'created_at',
        'updated_at'
    ];

//    public function create(array $array)
//    {
//
//    }
}
