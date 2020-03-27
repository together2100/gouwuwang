<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    protected $table = 'node';  // 关联数据表
    public $timestamps = false; // 维护时间戳
    protected $fillable = ['name','mname','aname','status']; // 批量赋值属性
}
