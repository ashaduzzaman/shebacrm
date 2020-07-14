<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\MasterCategory;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class MasterCategoryController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        $masterCategories = MasterCategory::get();
        // logger($masterCategories);
    	return view('master_category.index', compact('masterCategories'));
    }

    public function create()
    {
    	return view('master_category.create');
    }

    public function store(Request $request)
    {
    	$input = Input::all();
	    $rules = [
	    	'name' => 'required|unique:master_categories'
	    ];
	    $messages = [
            'name.required' => 'The Master Category field is required.',
            'name.unique' => 'The Master Category already exist.'
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $masterCategory = new MasterCategory;
        $masterCategory->name = $request->name;
        $masterCategory->created_by = Auth::id();
        $masterCategory->save();
        flash()->success($masterCategory->name.' Master Category created successfully');
    	return redirect('master-category');
    }

    public function edit($id)
    {
    	$masterCategory = MasterCategory::find($id);
    	return view('master_category.edit', compact('masterCategory'));
    }
    
    public function update(Request $request, $id)
    {
    	$masterCategory = MasterCategory::find($id);
    	$input = Input::all();
	    $rules = [
	    	'name' => 'required|unique:master_categories,name,'.$masterCategory->id,
	    	'status' => 'required',
	    ];
	    $messages = [
            'name.required' => 'The Master Category field is required.',
            'name.unique' => 'The Master Category already exist.'
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $masterCategory->name = $request->name;
        $masterCategory->status = $request->status;
        $masterCategory->updated_by = Auth::id();
        $masterCategory->save();
        flash()->success($masterCategory->name.' Master Category updated successfully');
    	return redirect('master-category');
    }
}
