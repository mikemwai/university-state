<?php

namespace App\Http\Controllers;
use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\StudentRecord;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function list()
    {
        return StudentRecord::all();

    }
    public function index()
    {
        //
        $students = Student::paginate();

        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'grade' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $student = Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'grade' => $request->grade,
        ]);
          return response()->json($student, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'string',
            'last_name' => 'string',
            'grade' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $student->update($request->all());

        return response()->json($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $student->delete();

        return response()->json(null, 204);
    }
}
