<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresss';  // 关联数据表
    public $timestamps = true; // 维护时间戳
    protected $fillable = ['name','phone','user_id','huo','xhuo']; // 批量赋值属性
}
