<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';  // 关联数据表
    public $timestamps = true; // 维护时间戳
    protected $fillable = ['title','descr','thumb','editor']; // 批量赋值属性
}
