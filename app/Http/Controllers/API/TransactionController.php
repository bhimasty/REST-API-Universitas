<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaction::with('getStudent', 'getSubject')->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $student = Student::where('id', '=', $request->students_id)->get();
            $subject = Subject::where('id', '=', $request->subjects_id)->get();

            $deptStudent = $student[0]['departments_id'];
            $deptSubject = $subject[0]['departments_id'];

            if ($deptStudent == $deptSubject) {
                $request->validate([
                    'students_id' => 'required|exists:students,id',
                    'subjects_id' => 'required|exists:subjects,id',
                ]);

                $transaction = Transaction::create([
                    'students_id' => $request->students_id,
                    'subjects_id' => $request->subjects_id,
                ]);

                $data = Transaction::where('id', '=', $transaction->id)->with('getStudent', 'getSubject')->get();

                if ($data) {
                    return ApiFormatter::createApi(200, 'Success', $data);
                } else {
                    return ApiFormatter::createApi(400, 'Failed');
                }
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Transaction::where('id', '=', $id)->with('getStudent', 'getSubject')->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $student = Student::where('id', '=', $request->students_id)->get();
            $subject = Subject::where('id', '=', $request->subjects_id)->get();

            $deptStudent = $student[0]['departments_id'];
            $deptSubject = $subject[0]['departments_id'];

            if ($deptStudent == $deptSubject) {
                $request->validate([
                    'students_id' => 'required|exists:students,id',
                    'subjects_id' => 'required|exists:subjects,id',
                ]);

                $transaction = Transaction::findOrFail($id);

                $transaction->update($request->all());

                $data = Transaction::where('id', '=', $transaction->id)->with('getStudent', 'getSubject')->get();

                if ($data) {
                    return ApiFormatter::createApi(200, 'Success', $data);
                } else {
                    return ApiFormatter::createApi(400, 'Failed');
                }
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $transaction = Transaction::findOrFail($id);

            $data = $transaction->delete();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success Destroy Data');
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
