<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'category';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'code_category',
        'name_category'
    ];

    public $timestamps = true;


    // Generate Id Custom
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
