<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\MasterCategory;
use App\Models\Category;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$categories = Category::with('masterCategory')->get();

    	return view('category.index', compact('categories'));
    }

    public function create()
    {
        $masterCategoryList = MasterCategory::pluck('name', 'id');

    	return view('category.create', compact('masterCategoryList'));
    }

    public function store(Request $request)
    {
    	$input = Input::all();
	    $rules = [
	    	'name' => 'required|unique:categories',
            'master_category_id' => 'required'
	    ];
	    $messages = [
            'name.required' => 'The Category field is required.',
            'name.unique' => 'The Category already exist.',
            'master_category_id.required' => 'The Master Category field is required.'
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $category = new Category;
        $category->name = $request->name;
        $category->master_category_id = $request->master_category_id;
        $category->created_by = Auth::id();
        $category->save();
        flash()->success($category->name.' Category created successfully');
    	return redirect('category');
    }

    public function edit($id)
    {
    	$category = Category::find($id);
        $masterCategoryList = MasterCategory::pluck('name', 'id');

    	return view('category.edit', compact('category', 'masterCategoryList'));
    }
    
    public function update(Request $request, $id)
    {
    	$category = Category::find($id);
    	$input = Input::all();
	    $rules = [
	    	'name' => 'required|unique:categories,name,'.$category->id,
            'master_category_id' => 'required',
	    	'status' => 'required',
	    ];
	    $messages = [
            'name.required' => 'The Category field is required.',
            'master_category_id.required' => 'The Master Category field is required.',
            'name.unique' => 'The Category already exist.'
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $category->name = $request->name;
        $category->master_category_id = $request->master_category_id;
        $category->status = $request->status;
        $category->updated_by = Auth::id();
        $category->save();
        flash()->success($category->name.' Category updated successfully');
    	return redirect('category');
    }
}
