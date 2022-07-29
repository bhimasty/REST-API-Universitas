<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['students_id', 'subjects_id'];

    protected $hidden = [];

    public function getStudent()
    {
        return $this->belongsTo('App\Models\Student', 'students_id', 'id');
    }

    public function getSubject()
    {
        return $this->belongsTo('App\Models\Subject', 'subjects_id', 'id');
    }
}
