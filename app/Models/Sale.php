<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'code',
        'total',
        'subtotal',
        'iva',
        'product',
        'invoice_path',
        'payment_day',
        'client_id',
        'user_id'
    ];

    protected $attributes = [
        'total' => 0.0,
        'subtotal' => 0.0,
        'iva' => 0.0,
        'product' => '[]',
        'invoice_path' => null,
        'payment_day' => 'LUNES'
    ];

    protected $primaryKey = 'id';

    protected $table = 'sales';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'code'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function makeSaleCode(){
        return 'HD-V'.'-'.uniqid();
    }

    public function user(){
        return $this->belongsTo( User::class );
    }

    public function client(){
        return $this->belongsTo( Client::class );
    }
}
