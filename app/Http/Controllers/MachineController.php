<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machine;
use App\Models\Article;

class MachineController extends Controller
{
    function all()
    {
        $machines = Machine::all();
        $data = compact('machines');
        return view('allMachines')->with($data);
    }
    function new()
    {
        $edit = 0;
        $page_heading = 'Add M&P';
        $submit_url = '/save-machine';
        $data = compact('edit', 'submit_url', 'page_heading');
        return view('machineForm')->with($data);
    }
    function save(Request $request)
    {
        $request->validate(
            [
                'machine_name' => 'required',
                'quantity' => 'required',
                'commisionedDate' => 'required',
                'supplier' => 'required',
                'price' => 'required',
                'dmrcPO' => 'required',
                'installedLocation' => 'required',
                'commisioningEmployees' => 'required',
                'remark' => 'required'
            ]
        );
        $machine = new Machine();
        $machine->name = $request['machine_name'];
        $machine->quantity = $request['quantity'];
        $machine->commisionedDate = $request['commisionedDate'];
        $machine->supplier = $request['supplier'];
        $machine->price = $request['price'];
        $machine->dmrcPO = $request['dmrcPO'];
        $machine->installedLocation = $request['installedLocation'];
        $machine->commisioningEmployees = $request['commisioningEmployees'];
        $machine->remark = $request['remark'];
        $machine->save();
        $request->session()->flash('success', $machine->name . ' added');
        return redirect('/machines');
    }
    function edit(Request $request, $id)
    {
        $machine = Machine::find($id);
        if (!is_null($machine)) {
            $page_heading = "Edit M&P";
            $edit = 1;
            $submit_url = '/update-machine/' . $id;
            $data = compact('machine', 'page_heading', 'edit', 'submit_url');
            return view('machineForm')->with($data);
        } else {
            $request->session()->flash('danger', 'No M&P found with id ' . $id);
        }
        return redirect('/machines');
    }
    function update(Request $request, $id)
    {
        $machine = Machine::find($id);
        $request->validate(
            [
                // 'machine_name' => 'required',
                'quantity' => 'required',
                'commisionedDate' => 'required',
                'supplier' => 'required',
                'price' => 'required',
                'dmrcPO' => 'required',
                'installedLocation' => 'required',
                'commisioningEmployees' => 'required',
                'remark' => 'required'
            ]
        );
        // $machine->name = $request['machine_name'];
        $machine->quantity = $request['quantity'];
        $machine->commisionedDate = $request['commisionedDate'];
        $machine->supplier = $request['supplier'];
        $machine->price = $request['price'];
        $machine->dmrcPO = $request['dmrcPO'];
        $machine->installedLocation = $request['installedLocation'];
        $machine->commisioningEmployees = $request['commisioningEmployees'];
        $machine->remark = $request['remark'];
        $machine->save();
        $request->session()->flash('success', $machine->name . ' updated');
        return redirect('/machines');
    }
    function introduction($machineName, $id)
    {
        $machine = Machine::find($id);
        $machineName = $machine->name;
        $intro = $machine->introduction;
        $articles = Article::where('category', $machineName)->latest()->take(10)->get(['id', 'title']);
        $data = compact('intro', 'machineName', 'id', 'articles');
        return view('machineIntro')->with($data);
    }
    function editIntro($machineName, $id)
    {
        $machine = Machine::find($id);
        $machineName = $machine->name;
        $intro = $machine->introduction;
        $data = compact('intro', 'machineName', 'id');
        return view('editMachineIntro')->with($data);
    }
    function updateIntro(Request $request, $id)
    {
        $machine = Machine::find($id);
        $machine->introduction = $request['machineIntro'];
        $machineName = $machine->name;
        $machine->save();
        $request->session()->flash('success', "Introduction of $machine->name updated");
        return redirect("/machine-introduction/" . $machineName . "/" . $id);
    }
}
