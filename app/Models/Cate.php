<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table = 'cate';  // 关联数据表
    public $timestamps = true; // 维护时间戳
    protected $fillable = ['name','pid','path','status']; // 批量赋值属性
}
