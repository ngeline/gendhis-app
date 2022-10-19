<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrderModel extends Model
{
    use HasFactory;

    protected $table = "tb_detail_order";
    protected $guarded = ["id"];
}
