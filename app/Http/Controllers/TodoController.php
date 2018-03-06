<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
class TodoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($term=null)
    {
      if($term!=null){
        $tasks['data']=Todo::where('name','like','%'.$term.'%')->get();
        return request()->json(200,$tasks);
      }
      return $this->getrecord();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $todo=Todo::create($request->all());
        if($todo){
          return $this->getrecord();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $task)
    {
        return "this is show method";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $task)
    {
    //  $task = todo::find($task);
      return request()->json(200,$task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, Todo $task)
    {
      $task->name=$request->name;
      if($task->save()){
        return $this->getrecord();
      }
    }
    private function getrecord(){
      $tasks=Todo::orderBy('created_at','desc')->paginate(10);
      return request()->json(200,$tasks);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $task)
    {
        if($task->delete()){
         return $this->getrecord();
        }else{
          return repsonse()->json(425,['delete'=>'Error deleting record']);
        }
    }
}
