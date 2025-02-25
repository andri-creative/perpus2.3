<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Borrow_DetailModel extends Model
{
    use HasFactory;
    protected $table = 'borrow_details';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'borrow_id',
        'book_id',
        'counter',
        'status',
        'book_identity',
        'borrowed_by',
        'returned_by',
        'borrow_date',
        'return_date',
        'keterlambatan',
    ];

    public $timestamps = true;

    public function getBorrowDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getReturnDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d-m-Y') : null;
    }


    public function getExpectedReturnDate($borrowDuration)
    {
        return Carbon::parse($this->borrow_date)->addMonths($borrowDuration);
    }

    // Perbarui status keterlambatan
    public function updateKeterlambatan($borrowDuration, $returnDate)
    {
        $expectedReturnDate = $this->getExpectedReturnDate($borrowDuration);

        if (Carbon::parse($returnDate)->greaterThan($expectedReturnDate)) {
            $this->keterlambatan = 'terlambat';
        } else {
            $this->keterlambatan = 'tepat_waktu';
        }

        $this->return_date = $returnDate;
        $this->save();
    }

    // protected $guarded = [];
    public function borrowedBy()
    {
        return $this->belongsTo(User::class, 'borrowed_by');
    }

    public function returnedBy()
    {
        return $this->belongsTo(User::class, 'returned_by');
    }

    public function rack()
    {
        return $this->belongsTo(RackModel::class, 'id_rack', 'id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    public function borrow()
    {
        return $this->belongsTo(BorrowModel::class, 'borrow_id');
    }

    public function borrowedByUser()
    {
        return $this->belongsTo(User::class, 'borrowed_by');
    }
    public function returnedByUser()
    {
        return $this->belongsTo(User::class, 'returned_by');
    }

    public function books()
    {
        return $this->belongsTo(BooksModel::class, 'book_id');
    }

    public function book()
    {
        return $this->belongsTo(BooksModel::class, 'book_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
