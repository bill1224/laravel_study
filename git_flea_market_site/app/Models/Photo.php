<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;;

class Photo extends Model
{
    use HasFactory;

    protected $fillable =['url', 'hashname', 'originalname', 'user_id', 'product_id'];

    public function product() {
        return $this->belongsTo(Product::class);  // one to many
    }
}
