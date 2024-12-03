<?php

namespace App\Http\Controllers;

use App\Mail\AnnouncementMail;
use App\Models\Announcements;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $anc_arr = array();
        $id = Auth::user()->id;

        $anc = Announcements::where('created_by_id', $id)->get();
        if (isset($anc) && !empty($anc)) {
            $anc_arr = $anc;
        }
        return view('announcements.index', ['anc' => $anc_arr]);
    }

    public function create()
    {
        return view('announcements.create');
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
        $anc->created_by_type = 'teachers';
        $anc->created_by_id = Auth::user()->id;

        $anc->save();

        $my_students = User::where('teacher_id', Auth::user()->id)->get();

        $my_students = User::where('teacher_id', Auth::user()->id)->get();
        if (isset($my_students) && !empty($my_students)) {

            foreach ($my_students as $student) {
                try {
                    Mail::to($student->email)->send(new AnnouncementMail($anc));
                } catch (\Exception $e) {

                    Log::error("Something went wrong {$student->email}. Error: {$e->getMessage()}");
                }
            }
        }
        return redirect()->route('annoucements');
    }


    public function edit($id)
    {

        $anc_arr = array();

        $anc = Announcements::find($id);

        if (isset($anc) && !empty($anc)) {
            $anc_arr = $anc;
        }

        return view('announcements.edit', ['anc' => $anc_arr]);
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',

        ]);

        $anc = Announcements::find($id);
        if (!$anc) {
            return redirect()->route('annoucements')->with('error', 'Announcements not exists');
        }
        $anc->title = $request->title;
        $anc->content = $request->content;
        $anc->save();

        return redirect()->route('annoucements');
    }

    public function delete($id)
    {

        $anc = Announcements::find($id);
        if (!$anc) {
            return redirect()->route('annoucements')->with('error', 'Annoucements not exists');
        }
        $anc->delete();
        return redirect()->route('annoucements');
    }
}
