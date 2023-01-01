<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;


class SubjectController extends Controller
{
    //
    function view()
    {
        return Subject::all();

    }

   function add(Request $req)
   {
    $subject = New Subject();
    $subject->name = $req ->input('name');
    $subject->slug = $req ->input('slug');
    $subject->my_class_id = $req ->input('my_class_id');
    $subject->teacher_id = $req ->input('teacher_id');
    $subject->save();

    return response()->json(['success' => true], 201);
    //return ["Result"=>"Data has been saved"];
   }
    function modify(Request $req)
   {
    $subject=  Subject::find($req->id);
    $subject->name= $req ->name;
    $subject->slug = $req ->slug;
    $subject->my_class_id = $req ->my_class_id;
    $subject->teacher_id= $req ->teacher_id;
    $subject->save();
    return response()->json($subject);
    return response()->json(['success' => true], 201);

   
   }
   function destroy(Request $request)
    {
    $subject = Subject::findOrFail($request->id);
    $subject->delete();

    return response()->json($subject::all());
    }
}
}
