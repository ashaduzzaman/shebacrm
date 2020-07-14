<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\MasterCategory;
use App\Models\Category;
use App\Models\SubCategory;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        // $subCategories = SubCategory::with('Category', 'masterCategory')->get();
        $subCategories = SubCategory::all();
        // logger($subCategories);
        // dd($subCategories);
        return view('sub_category.index', compact('subCategories'));
        // return response()->json($subCategories);
    }

    public function create()
    {
        $categoryList = Category::pluck('name', 'id');
        $masterCategoryList = MasterCategory::pluck('name', 'id');


    	return view('sub_category.create', compact('categoryList', 'masterCategoryList'));
    }

    public function store(Request $request)
    {
        logger($request);
    	$input = Input::all();
	    $rules = [
	    	'name' => 'required|unique:sub_categories',
            'master_category_id' => 'required',
            'category_id' => 'required'
	    ];
	    $messages = [
            'name.required' => 'The Sub Category field is required.',
            'name.unique' => 'The Sub Category already exist.',
            'category_id.required' => 'The Category field is required.',
            'master_category_id.required' => 'The Master Category field is required.'
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $subCategory = new SubCategory;
        $subCategory->name = $request->name;
        $subCategory->master_category_id = $request->master_category_id;
        $subCategory->category_id = $request->category_id;
        $subCategory->created_by = Auth::id();
        $subCategory->save();
        flash()->success($subCategory->name.' Sub Category created successfully');
    	return redirect('sub-category');
    }

    public function edit($id)
    {
        logger('hi i am here');
    	$subCategory = SubCategory::find($id);
        $masterCategoryList = MasterCategory::pluck('name', 'id');
        $categoryList = Category::pluck('name', 'id');

    	return view('sub_category.edit', compact('subCategory', 'masterCategoryList', 'categoryList'));
    }
    
    public function update(Request $request, $id)
    {
        logger($request);
    	$subCategory = SubCategory::find($id);
    	$input = Input::all();
	    $rules = [
	    	'name' => 'required|unique:sub_categories,name,'.$subCategory->id,
            'master_category_id' => 'required',
            'category_id' => 'required',
	    	'status' => 'required',
	    ];
	    $messages = [
            'name.required' => 'The Sub Category field is required.',
            'master_category_id.required' => 'The Master Category field is required.',
            'category_id.required' => 'The Category field is required.',
            'name.unique' => 'The Sub Category already exist.'
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->category_id = $request->category_id;
        $subCategory->status = $request->status;
        $subCategory->updated_by = Auth::id();
        $subCategory->save();
        flash()->success($subCategory->name.' Sub Category updated successfully');
    	return redirect('sub-category');
    }

    public function getCategory(Request $request)
    {   
        $categories = Category::where('master_category_id', $request->master_category_id)->pluck('name', 'id');

        return response()->json($categories);
    }
}
