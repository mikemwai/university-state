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

   function add()
   {
    return ["Result"=>"Data has been saved"];
   }
}
