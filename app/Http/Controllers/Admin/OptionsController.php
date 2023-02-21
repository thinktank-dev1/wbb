<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;
use Validator;

use App\Models\Option;

class OptionsController extends Controller
{
    public function index($type, $id = null){
        if($id){
            $option = Option::find($id);
        }
        else{
            $option = new Option();
        }
        
        $options = Option::where('type', $type)->orderBy('name', 'ASC')->paginate(12);
        
        return view('admin.options.list', [
            'type' => $type,
            'option' => $option,
            'options' => $options,
        ]);
    }
    
    public function saveOption(){
        $valid = Validator::make(Request::all(),[
            'name' => 'required',
        ]);
        if($valid->fails()){
            return back()->withErrors($valid)->withInput();
        }
        $action = Request::input('action');
        if($action == "create"){
            $option = new Option();
        }
        else{
            $option = Option::find($action);
        }
        
        $option->name = Request::input('name');
        $option->type = Request::input('type');
        $option->save();
        
        return redirect('admin/options/'.Request::input('type'));
    }
    
    public function deleteOption($id){
        $op = Option::find($id);
        $op->delete();
        return back();
    }
}
