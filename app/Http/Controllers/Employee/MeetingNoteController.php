<?php

namespace App\Http\Controllers\Employee;

use App\Models\MeetingNote;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMeetingNoteRequest;
use App\Http\Requests\UpdateMeetingNoteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MeetingNoteController extends Controller
{
    public function index()
    {   
        // dd(Auth::user()->role->slug);
        if(Auth::check() && Auth::user()->role->slug == 'employee') {
            session(
                [
                    "page" => "meeting-notes",
                    "page_title" => "Meeting Notes",
                    "page_icon" => "fas fa-sticky-note",
                    "bread_crumb" => [
                        "Home" => route('employee.dashboard'),
                        "Meeting Notes" => ""
                    ]
                ]
            );
            $meetingNoteList = MeetingNote::where('user_id', Auth::user()->id)->get();
            return view('employee.pages.meeting-notes.index', compact('meetingNoteList'));
        } else {
            return redirect()->route('login');
        }
    }

    public function create()
    {
        if(Auth::check() && Auth::user()->role->slug == 'employee') {
            session(
                [
                    "page" => "meeting-notes",
                    "page_title" => "Meeting Notes",
                    "page_icon" => "fas fa-sticky-note",
                    "bread_crumb" => [
                        "Home" => route('employee.dashboard'),
                        "Meeting Notes" => route('employee.meeting-notes'),
                        "Create" => ""
                    ]
                ]
            );
            return view('employee.pages.meeting-notes.create');
        } else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        if(Auth::check() && Auth::user()->role->slug == 'employee') {
            $validated_data = Validator::make($request->all(), [
                'note' => 'required',
                'note_url' => 'required',
                'marketplace' => 'required',
                'client_account' => 'required',
            ]);
            
            if ($validated_data->fails()) {
                return redirect()->back()->withErrors($validated_data)->withInput();
            }

            // dd($request->note);

            for($i = 0; $i < count($request->note); $i++) {
                $meetingNote                    = new MeetingNote();
                $meetingNote->note              = $request->note[$i];
                $meetingNote->note_url          = $request->note_url[$i];
                $meetingNote->marketplace       = $request->marketplace[$i];
                $meetingNote->priority          = $request->priority[$i];
                $meetingNote->client_account_id = $request->client_account[$i];
                $meetingNote->user_id           = Auth::user()->id;
                $meetingNote->save();
            }
            return redirect()->route('employee.meeting-notes')->with([
                'message' => 'Meeting Note added successfully',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->route('login')->with('error', 'You are not authorized to access this page');
        }
    }

    public function show(MeetingNote $meetingNote)
    {
        
    }

    public function edit(MeetingNote $meetingNote)
    {
        //
    }

    public function update(Request $request, $meetingNote)
    {
        if(Auth::check() && Auth::user()->role->slug == 'employee') {
            $validated_data = Validator::make($request->all(), [
                'note' => 'required',
                'note_url' => 'required',
                'marketplace' => 'required',
                'client_account' => 'required',
            ]);
            
            if ($validated_data->fails()) {
                return redirect()->back()->withErrors($validated_data)->withInput();
            }

            $meetingNote                   = MeetingNote::find($meetingNote);
            $meetingNote->note             = $request->note;
            $meetingNote->note_url         = $request->note_url;
            $meetingNote->marketplace      = $request->marketplace;
            $meetingNote->priority         = $request->priority;
            $meetingNote->update();
            
            return redirect()->route('employee.meeting-notes')->with([
                'message' => 'Meeting Note updated successfully',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->route('login')->with('error', 'You are not authorized to access this page');
        }
    }

    public function destroy($meetingNote)
    {
        if(Auth::check() && Auth::user()->role->slug == 'employee') {
            $meetingNote = MeetingNote::find($meetingNote);
            $meetingNote->delete();
            return redirect()->route('employee.meeting-notes')->with([
                'message' => 'Meeting Note deleted successfully',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->route('login')->with('error', 'You are not authorized to access this page');
        }
    }
}
