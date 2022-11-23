<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fault;

class FaultController extends Controller
{
    function all_faults($machine)
    {
        $faults = Fault::all();
        $data = compact('faults', 'machine');
        return view('all_faults')->with($data);
    }
}
