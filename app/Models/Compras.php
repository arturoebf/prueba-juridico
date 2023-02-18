<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Compras extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'producto_id',
        'all_price',
        'tax_price',
        'invoiced',
        'factura_id',
    ];
    public function client()
    {
        return $this->hasOne(User::class, 'id','client_id');
    }
    public function product()
    {
        return $this->hasOne(Product::class, 'id','producto_id')->orderby('created_at');
    }
}
