<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldOfWork extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function userFields(){
        return $this->hasMany(UserField::class);
    }
}
