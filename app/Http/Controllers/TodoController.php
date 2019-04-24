<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoStoreRequest;
use App\Todo;
use Illuminate\Support\Facades\Input;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        return $user->todos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return form for creating todoItem
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoStoreRequest $request)
    {
        $todo = new Todo([
            'user_id' => auth()->id(),
            'description' => $request->get('description')
        ]);

        $todo->save();

        return $todo;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todoItem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();

        return $user->todos->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todoItem
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todoItem
     * @return \Illuminate\Http\Response
     */
    public function update(TodoStoreRequest $request, $id)
    {
        $user = auth()->user();

        $todo = $user->todos->find($id);

        $todo->description = Input::get('description');

        $todo->save();

        return $todo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todoItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user();

        $user->todos->find($id)->delete();
    }
}
