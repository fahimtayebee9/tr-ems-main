<?php

namespace App\Http\Controllers;

use App\Models\TaskBoard;
use App\Http\Requests\StoreTaskBoardRequest;
use App\Http\Requests\UpdateTaskBoardRequest;

class TaskBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskBoardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskBoardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskBoard  $taskBoard
     * @return \Illuminate\Http\Response
     */
    public function show(TaskBoard $taskBoard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskBoard  $taskBoard
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskBoard $taskBoard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskBoardRequest  $request
     * @param  \App\Models\TaskBoard  $taskBoard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskBoardRequest $request, TaskBoard $taskBoard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskBoard  $taskBoard
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskBoard $taskBoard)
    {
        //
    }
}
