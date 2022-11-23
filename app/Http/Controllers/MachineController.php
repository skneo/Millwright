<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machine;
use App\Models\Article;

class MachineController extends Controller
{
    function all_machines()
    {
        $machines = Machine::all();
        $data = compact('machines');
        return view('allMachines')->with($data);
    }
    public function show_form()
    {
        $edit = 0;
        $page_heading = 'Add Asset';
        $submit_url = '/add-machine';
        $data = compact('edit', 'submit_url', 'page_heading');
        return view('machineForm')->with($data);
    }
    public function add_machine(Request $request)
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
        $request->session()->flash('success', $machine->name . ' added!');
        return redirect('/machines');
    }
    public function edit(Request $request, $id)
    {
        $machine = Machine::find($id);
        if (!is_null($machine)) {
            $page_heading = "Edit Asset";
            $edit = 1;
            $submit_url = '/update-machine/' . $id;
            $data = compact('machine', 'page_heading', 'edit', 'submit_url');
            return view('machineForm')->with($data);
        } else {
            $request->session()->flash('danger', 'No M&P found with id ' . $id);
        }
        return redirect('/machines');
    }
    public function update(Request $request, $id)
    {
        $machine = Machine::find($id);
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
        $request->session()->flash('success', $machine->name . ' updated!');
        return redirect('/machines');
    }
    public function introduction($assetName, $id)
    {
        $asset = Machine::find($id);
        $assetName = $asset->name;
        $intro = $asset->introduction;
        $articles = Article::where('category', $assetName)->get(['id', 'title']);
        // echo $articles;
        // die;
        $data = compact('intro', 'assetName', 'id', 'articles');
        return view('assetIntro')->with($data);
    }
    public function editIntro($assetName, $id)
    {
        $asset = Machine::find($id);
        $asssetName = $asset->name;
        $intro = $asset->introduction;
        $data = compact('intro', 'assetName', 'id');
        return view('editIntro')->with($data);
    }
    public function updateIntro(Request $request, $id)
    {
        $asset = Machine::find($id);
        $asset->introduction = $request['assetIntro'];
        $assetName = $asset->name;
        $asset->save();
        $request->session()->flash('success', $asset->name . 'introduction updated!');
        return redirect("/asset-introduction/" . $assetName . "/" . $id);
    }
}
