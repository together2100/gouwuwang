<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';  // 关联数据表
    public $timestamps = true; // 维护时间戳
    protected $fillable = ['order_num','user_id','address_id','status']; // 批量赋值属性
}
