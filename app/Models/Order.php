<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';  // 关联数据表
    public $timestamps = true; // 维护时间戳
    protected $fillable = ['order_num','shop_id','address_id',
    'user_id','num','total','status']; // 批量赋值属性
}
