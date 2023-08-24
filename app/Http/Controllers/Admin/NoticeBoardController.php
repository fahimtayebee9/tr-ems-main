<?php

namespace App\Http\Controllers\Admin;

use App\Models\NoticeBoard;
use App\Http\Requests\StoreNoticeBoardRequest;
use App\Http\Requests\UpdateNoticeBoardRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NoticeBoardController extends Controller
{
    public function index()
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    "page" => "notice-board",
                    "page_title" => "Notice Board",
                    "page_icon" => "fas fa-calendar-check",
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Notice Board' => '',
                    ],
                ]
            );
            $noticeList = NoticeBoard::orderBy('id', 'desc')->get();
            return view('admin.notice-board.index', compact('noticeList'));
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }
        else{
            $notice                 = new NoticeBoard();
            $notice->notice_uid     = time();
            $notice->title          = $request->title;
            $notice->description    = $request->description;
            $notice->notice_date    = $request->publish_date;
            $notice->expiry_date    = $request->expiry_date;
            $notice->status         = $request->status;
            $notice->created_by     = Auth::user()->id;
            $notice->save();
            return redirect()->route('admin.notice-board.index')->with([
                'message' => 'Notice added successfully!',
                'alert-type' => 'success',
            ]);
        }
    }

    public function show(NoticeBoard $noticeBoard)
    {
        //
    }

    public function edit(NoticeBoard $noticeBoard)
    {
        
    }

    public function update(Request $request, $noticeBoard)
    {
        $noticeBoard = NoticeBoard::find($noticeBoard);
        
        if(!$noticeBoard){
            return redirect()->back()->with([
                'message' => 'Notice not found!',
                'alert-type' => 'error',
            ]);
        }
        else{
            $validated = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'description' => 'required',
                'notice_date' => 'required|date',
            ]);
    
            if ($validated->fails()) {
                return redirect()->back()->withErrors($validated)->withInput();
            }
            else{
                $noticeBoard->title          = $request->title;
                $noticeBoard->description    = $request->description;
                $noticeBoard->notice_date    = $request->notice_date;
                $noticeBoard->expiry_date    = $request->expiry_date;
                $noticeBoard->status         = $request->status;
                $noticeBoard->updated_by     = Auth::user()->id;
                $noticeBoard->update();
                return redirect()->back()->with([
                    'message' => 'Notice updated successfully!',
                    'alert-type' => 'success',
                ]);
            }
        }
    }

    public function destroy($noticeBoard)
    {
        $noticeBoard = NoticeBoard::find($noticeBoard);

        if(!$noticeBoard){
            return redirect()->back()->with([
                'message' => 'Notice not found!',
                'alert-type' => 'error',
            ]);
        }
        else{
            $noticeBoard->delete();
            return response()->json([
                'status' => 'success', // success or error
                'code' => 200, // 200, 400, 500, etc
                'message' => 'Notice deleted successfully!',
                'alert-type' => 'success',
            ]);
        }
    }
}
