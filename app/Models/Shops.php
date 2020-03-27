<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    protected $table = 'shops';  // 关联数据表
    public $timestamps = false; // 维护时间戳
    protected $fillable = ['name','cate_id','pic','descr','num','price']; // 批量赋值属性
}
