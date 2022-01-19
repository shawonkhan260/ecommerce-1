<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\product;

class orderlist extends Model
{
    use HasFactory;
    public function product():BelongsTo
    {
        return $this->belongsTo(product::class,'product_id','id');
    }

}
