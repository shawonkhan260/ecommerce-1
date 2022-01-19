<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orderlist;


class order extends Model
{
    use HasFactory;
    public function productlist()
    {
        return $this->hasmany(orderlist::class);
    }
}
