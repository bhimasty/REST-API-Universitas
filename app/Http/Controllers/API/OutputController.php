<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Http\Request;

class OutputController extends Controller
{
    public function output1($student)
    {
        $data = Transaction::where('students_id', '=', $student)->with('getStudent', 'getSubject')->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function output2($subject)
    {
        $student = Transaction::where('subjects_id', '=', $subject)->get();
        $data = $student->count();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function output3($department)
    {
        $student = Student::where('departments_id', '=', $department)->get();
        $data = $student->count();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
