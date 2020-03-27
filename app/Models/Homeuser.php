<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homeuser extends Model
{
    protected $table = 'home_users';  // 关联数据表
    public $timestamps = true; // 维护时间戳
    protected $fillable = ['name','pass','pic','email','tel','status','token']; // 批量赋值属性
}
