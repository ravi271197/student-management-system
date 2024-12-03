<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnoucementsController extends Controller
{
    public function index()
    {

        $anc_arr = array();

        $ancs = Announcements::leftJoin('users', function ($join) {
            $join->on('announcements.created_by_id', '=', 'users.id');
        })->select('announcements.*', 'users.first_name', 'users.last_name')->get();
        
        if (isset($ancs) && !empty($ancs)) {
            $anc_arr = $ancs;
        }

        return view('admin.annoucements.index', ['ancs' => $anc_arr]);
    }

    public function create()
    {
        return view('admin.annoucements.create');
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $anc =  new Announcements();
        $anc->title = $request->title;
        $anc->content = $request->content;
        $anc->created_by_type = 'admin';
        $anc->created_by_id = Auth::guard('admin')->user()->id;

        $anc->save();

        return redirect()->route('admin.annoucements');
    }

    public function edit($id)
    {

        $anc_arr = array();

        $anc = Announcements::find($id);

        if (isset($anc) && !empty($anc)) {
            $anc_arr = $anc;
        }

        return view('admin.annoucements.edit', ['anc' => $anc_arr]);
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',

        ]);

        $anc = Announcements::find($id);
        if (!$anc) {
            return redirect()->route('admin.annoucements')->with('error', 'Teacher not exists');
        }
        $anc->title = $request->title;
        $anc->content = $request->content;
        $anc->save();

        return redirect()->route('admin.annoucements');
    }

    public function delete($id)
    {

        $anc = Announcements::find($id);
        if (!$anc) {
            return redirect()->route('admin.annoucements')->with('error', 'Annoucements not exists');
        }
        $anc->delete();
        return redirect()->route('admin.annoucements');
    }
}
