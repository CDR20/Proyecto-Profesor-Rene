<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'code',
        'name',
        'image',
        'shop_price',
        'provider_price',
        'stock',
        'provider_id',
        'inversor_id'
    ];

    protected $attributes = [
        'code' => 'HD-0000000000',
        'shop_price' => 0.00,
        'provider_price' => 0.00,
        'stock' => 0,
        'image' => 'products/default.png'
    ];

    protected $primaryKey = 'id';

    protected $table = 'products';

    public static function makeProductCode(){
        return 'HD'.'-'.uniqid();
    }

    public function provider(){
        return $this->belongsTo( Provider::class, 'provider_id' );
    }

    public function inversor(){
        return $this->belongsTo( User::class, 'inversor_id' );
    }

    public function getGetUpdateDateAttribute()
    {
        $date = Carbon::create($this->updated_at)->locale('es');
        return "$date->dayName $date->day $date->monthName de $date->year";
    }
}