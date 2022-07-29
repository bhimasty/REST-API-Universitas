<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'faculties_id'];

    protected $hidden = [];

    public function getFaculty()
    {
        return $this->belongsTo('App\Models\Faculty', 'faculties_id', 'id');
    }

    public function hasSubjects()
    {
        return $this->hasMany('App\Models\Subject', 'faculties_id', 'id');
    }
}
