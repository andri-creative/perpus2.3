<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoryModel extends Model
{
    use HasFactory;
    protected $table = 'history';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'judul_books',
        'isbn_books',
        'category',
        'status',
        'name_borrow',
        'class_position',
        'phone_borrow'
    ];

    public $timestamps = true;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
