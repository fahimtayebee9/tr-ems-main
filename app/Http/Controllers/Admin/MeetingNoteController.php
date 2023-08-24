<?php

namespace App\Http\Controllers\Admin;

use App\Models\MeetingNote;
use App\Http\Requests\StoreMeetingNoteRequest;
use App\Http\Requests\UpdateMeetingNoteRequest;
use App\Http\Controllers\Controller;

class MeetingNoteController extends Controller
{
    public function index()
    {
        $meetingNoteList = MeetingNote::all();
        
    }

    public function create()
    {
        //
    }

    public function store(StoreMeetingNoteRequest $request)
    {
        //
    }

    public function show(MeetingNote $meetingNote)
    {
        //
    }

    public function edit(MeetingNote $meetingNote)
    {
        //
    }

    public function update(UpdateMeetingNoteRequest $request, MeetingNote $meetingNote)
    {
        //
    }

    public function destroy(MeetingNote $meetingNote)
    {
        //
    }
}
