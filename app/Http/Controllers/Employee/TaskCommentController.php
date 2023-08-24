<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaskBoard;
use App\Models\TaskComment;
use App\Models\TaskCheckList;
use App\Models\Employee;
use App\Models\User;
use App\Models\RoleManager;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TaskCommentController extends Controller
{
    public function getByTask($task_id){
        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            
        }
    }

    public function store(Request $request){
        // validate $request by task_id, comment
        $validated_data = Validator::make($request->all(),[
            'task_id' => 'required',
            'comment' => 'required'
        ]);

        // check if data is validated
        if($validated_data->fails()){
            return response()->json([
                'status' => 'error',
                'message' => 'Validation Error',
                'errors' => $validated_data->errors()
            ]);
        }

        // create new comment
        $comment = new TaskComment();
        $comment->task_id = $request->task_id;
        $comment->comment = $request->comment;
        $comment->commented_by = Auth::user()->id;
        $comment->commented_at = \Carbon\Carbon::now();
        $comment->save();

        // return with success message
        return redirect()->back()->with([
            'message' => "Your comment has been posted.",
            'alert-type' => 'success'
        ]);
    }

    public function destroy($comment_id){
        $comment = TaskComment::where('id', $comment_id)->where('commented_by', Auth::user()->id)->first();
        if($comment){
            $comment->delete();
            return redirect()->back()->with([
                'message' => "Your comment has been deleted.",
                'alert-type' => 'success'
            ]);
        }
        else{
            return redirect()->back()->with([
                'message' => "You can't delete this message.",
                'alert-type' => "error" 
            ]);
        }
    }
}
