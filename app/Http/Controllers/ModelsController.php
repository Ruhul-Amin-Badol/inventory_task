<?php

namespace App\Http\Controllers;

use App\Models\models;
use App\Models\brand;
use Illuminate\Http\Request;

class ModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $modelss=models::with('brand')->get();
        $brandss=brand::with('models')->get();
        return view('modelss.index',['bran'=>$brandss],['mod'=>$modelss]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $models = new models;
        $models->brand_id=$request->brand_id;
        $models->name=$request->name;
        $models->entry_date=$request->date;
        $models->save();
        return redirect('models');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\models  $models
     * @return \Illuminate\Http\Response
     */
    public function show(models $models)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\models  $models
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model=models::find($id);
        $brand=brand::all();
        return view('modelss.edit',['mode'=>$model],['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\models  $models
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, models $models)
    {
        $models->update($request->all());
        return redirect('models');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\models  $models
     * @return \Illuminate\Http\Response
     */
    public function destroy( $models)
    {
        models::destroy($models);
        return redirect('models');
    }
}
