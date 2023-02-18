<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    use HasFactory;
    protected $fillable = [
        'total',
        'tax_total',
        'products_invoces',
        'client_id',
    ];
    public function client()
    {
        return $this->hasOne(User::class, 'id','client_id');
    }
}
