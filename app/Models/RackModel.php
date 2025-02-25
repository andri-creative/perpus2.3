<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RackModel extends Model
{
    use HasFactory;

    protected $table = 'rack';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'code_rack',
        'name_rack',
    ];

    public $timestamps = true;

    public function subs()
    {
        return $this->hasMany(SubModel::class, 'rack_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
