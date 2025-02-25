<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BorrowModel extends Model
{
    use HasFactory;
    protected $table = 'borrow';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name_borrow',
        'id_card',
        'position_borrow',
        'borrow_duration',
        'class_or_notes',
        'phone_borrow',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
