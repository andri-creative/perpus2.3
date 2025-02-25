<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubModel extends Model
{
    use HasFactory;

    protected $table = 'sub';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'code_sub',
        'rack_id'
    ];

    public $timestamps = true;

    public function rack()
    {
        return $this->belongsTo(RackModel::class, 'rack_id');
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
