<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fault;
use App\Models\Machine;

class FaultController extends Controller
{
    function all_faults()
    {
        $machines = Machine::all(['name']);
        $data = compact('machines');
        return view('all_faults')->with($data);
    }
    function machine_faults(Request $req)
    {
        $machine = $req['machine'];
        $faults = Fault::where('machine', $machine)->get();
        $data = compact('faults', 'machine');
        return view('machine_faults')->with($data);
    }
    public function new($machine)
    {
        $edit = 0;
        $page_heading = "New Fault of $machine";
        $submit_url = "/save-fault/$machine";
        $data = compact('edit', 'submit_url', 'page_heading', 'machine');
        return view('new_fault')->with($data);
    }
    public function save(Request $request, $machine)
    {
        $request->validate(
            [
                'occurred_on' => 'required',
                'sub_category' => 'required',
                'fault' => 'required',
                'rectification_date' => 'required',
                'rectification' => 'required',
                'spares_used' => 'required',
                'remark' => 'required'
            ]
        );
        $fault = new Fault();
        $fault->occurred_on = $request['occurred_on'];
        $fault->machine = $machine;
        $fault->sub_category = $request['sub_category'];
        $fault->fault = $request['fault'];
        $fault->rectification_date = $request['rectification_date'];
        $fault->rectification = $request['rectification'];
        $fault->spares_used = $request['spares_used'];
        $fault->remark = $request['remark'];
        $fault->entry_done_by = 'Satish';
        $fault->save();
        $request->session()->flash('success', $machine . "'s fault added!");
        return redirect("/faults?machine=$machine");
    }
    public function edit(Request $request, $machine, $id)
    {
        $fault = Fault::find($id);
        if (!is_null($fault)) {
            $page_heading = "Edit Fault of $machine";
            $edit = 1;
            $submit_url = '/update-fault/' . $id;
            $data = compact('fault', 'page_heading', 'edit', 'submit_url');
            return view('new_fault')->with($data);
        } else {
            $request->session()->flash('danger', 'No fault found with id ' . $id);
        }
        return redirect("/faults/$machine");
    }
    public function update(Request $request, $id)
    {
        $fault = Fault::find($id);
        $request->validate(
            [
                'occurred_on' => 'required',
                'sub_category' => 'required',
                'fault' => 'required',
                'rectification_date' => 'required',
                'rectification' => 'required',
                'spares_used' => 'required',
                'remark' => 'required'
            ]
        );
        // $fault = new Fault();
        $fault->occurred_on = $request['occurred_on'];
        // $fault->machine = $machine;
        $fault->sub_category = $request['sub_category'];
        $fault->fault = $request['fault'];
        $fault->rectification_date = $request['rectification_date'];
        $fault->rectification = $request['rectification'];
        $fault->spares_used = $request['spares_used'];
        // $fault->entry_done_by = $request['entry_done_by'];
        $fault->remark = $request['remark'];
        // $fault->entry_done_by = 'Satish';
        $fault->save();
        $request->session()->flash('success', $fault->machine . "'s fault updated!");
        return redirect("/faults?machine=$fault->machine");
    }
}
