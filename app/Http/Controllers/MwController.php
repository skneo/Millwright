<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MwController extends Controller
{
    function editBoard()
    {
        $board = file_get_contents("noticeboard.txt");
        $data = compact('board');
        return view('noticeBoardForm')->with($data);
    }
    function update(Request $req)
    {
        $board = $req['board'];
        // echo $board;
        file_put_contents('noticeboard.txt', $board);
        $req->session()->flash('success', 'Noticeboard updated!');
        return redirect('/');
    }
}
