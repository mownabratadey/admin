<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Field;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = Field::get();
        return view('field.index')->with(compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('field.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'field_type' => ['required'],
            'label' => ['required'],
            'field_name' => ['required'],
        ]);

        $field = new Field;
        $field->field_type = $request->field_type;
        $field->label = $request->label;
        $field->field_name = $request->field_name;
        $field->comments = $request->comments;
        if($request->attr_values){
            $field->attr_values = $request->attr_values;
        }

        $field->save();
        return redirect()->route('field.index')->with('success','Added successfully.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $field = Field::get()->where('id',$id)->first();
        return view('field.edit')->with(compact('field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'field_type' => ['required'],
            'label' => ['required'],
            'field_name' => ['required'],
        ]);

        $field = Field::where('id',$id)->first();
        $field->field_type = $request->field_type;
        $field->label = $request->label;
        $field->field_name = $request->field_name;
        $field->comments = $request->comments;
        if($request->attr_values){
            $field->attr_values = $request->attr_values;
        }

        $field->save();
        return redirect()->route('field.index')->with('success','Updated successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $field = Field::where('id',$id)->delete();
        return redirect()->route('field.index')->with('success','Deleted Successfully.');
    }
}
