<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machine;
use App\Models\Spare;

class SpareController extends Controller
{
    function spares($category)
    {
        if ($category == 'all') {
            $spares = Spare::all();
        } else {
            $spares = Spare::where('category', $category)->get();
        }
        $data = compact('spares', 'category');
        return view('spares_table')->with($data);
    }
    function new_spare()
    {
        $machines = Machine::all(['name']);
        $edit = 0;
        $page_heading = "Add Spare";
        $submit_url = "/save-spare";
        $data = compact('edit', 'submit_url', 'page_heading', 'machines');
        return view('spare_form')->with($data);
    }
    public function save(Request $request)
    {
        $request->validate(
            [
                'category' => 'required',
                'name' => 'required',
                'code' => 'required',
                'balance' => 'required',
                'unit' => 'required',
                'location' => 'required',
                'remark' => 'required'
            ]
        );
        $spare = new Spare();
        $spare->category = $request['category'];
        $spare->name = $request['name'];
        $spare->code = $request['code'];
        $spare->balance = $request['balance'];
        $spare->unit = $request['unit'];
        $spare->location = $request['location'];
        $spare->remark = $request['remark'];
        $spare->save();
        $request->session()->flash('success', "$spare->name added in $spare->category category");
        return redirect("/spares/all");
    }
    public function edit(Request $request, $id)
    {
        $spare = Spare::find($id);
        if (!is_null($spare)) {
            $machines = Machine::all(['name']);
            $page_heading = "Edit $spare->name";
            $edit = 1;
            $submit_url = '/update-spare/' . $id;
            $data = compact('spare', 'page_heading', 'edit', 'submit_url', 'machines');
            return view('spare_form')->with($data);
        } else {
            $request->session()->flash('danger', 'No spare found with id ' . $id);
        }
        return redirect("/spares/all");
    }
    public function update(Request $request, $id)
    {
        $spare = Spare::find($id);
        $request->validate(
            [
                'category' => 'required',
                'name' => 'required',
                'code' => 'required',
                'balance' => 'required',
                'unit' => 'required',
                'location' => 'required',
                'remark' => 'required'
            ]
        );
        $spare->category = $request['category'];
        $spare->name = $request['name'];
        $spare->code = $request['code'];
        $spare->balance = $request['balance'];
        $spare->unit = $request['unit'];
        $spare->location = $request['location'];
        $spare->remark = $request['remark'];
        $spare->save();
        $request->session()->flash('success', "$spare->name updated in $spare->category category");
        return redirect("/spares/all");
    }
}
