<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ValidatedRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $date = ['deleted_at'];
    protected $fillable = ['date', 'date_time', 'eletronic_point_id'];

    public function eletronicPoint()
    {
        return $this->belongsTo(EletronicPoint::class, 'eletronic_point_id');
    }
}
