<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adminusers extends Model
{
    protected $table = 'admin_users';  // 关联数据表
    public $timestamps = true; // 维护时间戳
    protected $fillable = ['name','password']; // 批量赋值属性
}
