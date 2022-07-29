<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'departments_id'];

    protected $hidden = [];

    public function getDepartment()
    {
        return $this->belongsTo('App\Models\Department', 'departments_id', 'id');
    }

    public function hasTransaction()
    {
        return $this->hasMany('App\Models\Transaction', 'subjects_id', 'id');
    }
}
