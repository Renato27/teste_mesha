<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EletronicPoint extends Model
{
    use HasFactory, SoftDeletes;

    protected $date = ['deleted_at'];
    protected $fillable = ['name', 'email', 'cpf', 'cell', 'validated'];

    public function validation()
    {
        return $this->hasOne(ValidatedRecord::class, 'eletronic_point_id', 'id');
    }
}
