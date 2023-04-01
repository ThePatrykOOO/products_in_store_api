<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as IAuditable;

class Product extends Model implements IAuditable
{
    use HasFactory, Auditable;

    protected $fillable = [
        'name',
        'shop_id',
        'ean',
        'sku',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function productGroups()
    {
        return $this->belongsToMany(ProductGroup::class, 'product_groups', 'parent_id', 'child_id');
    }
}
