<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users_info extends Model
{
    protected $table = 'users_info';  // 关联数据表
    public $timestamps = true; // 维护时间戳
    protected $fillable = ['username','nickname','sex','phone','email','birthday','user_id','pic']; // 批量赋值属性
}
