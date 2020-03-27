<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';  // 关联数据表
    public $timestamps = false; // 维护时间戳
    protected $fillable = ['name','status']; // 批量赋值属性
}
