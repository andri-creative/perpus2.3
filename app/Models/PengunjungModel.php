<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengunjungModel extends Model
{
    use HasFactory;

    protected $table = 'pengunjung';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'first_name',
        'day',
        'date_time',
        'kelas',
        'keperluan',
        'status',
        'durasi'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

}
