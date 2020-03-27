<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders_shop extends Model
{
    protected $table = 'orders_shop';  // 关联数据表
    public $timestamps = true; // 维护时间戳
    protected $fillable = ['order_id','shops_id','name','pic','num']; // 批量赋值属性
}
