<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name'];

    protected $hidden = [];

    public function hasDepartments()
    {
        return $this->hasMany('App\Models\Department', 'faculties_id', 'id');
    }
}
