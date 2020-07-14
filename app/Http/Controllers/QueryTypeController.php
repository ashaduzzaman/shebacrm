<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\QueryType;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class QueryTypeController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$queryTypes = QueryType::get();
    	return view('query_type.index', compact('queryTypes'));
    }

    public function create()
    {
    	return view('query_type.create');
    }

    public function store(Request $request)
    {
    	$input = Input::all();
	    $rules = [
	    	'name' => 'required|unique:query_types'
	    ];
	    $messages = [
            'name.required' => 'The Query Type field is required.',
            'name.unique' => 'The Query Type already exist.'
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $queryType = new QueryType;
        $queryType->name = $request->name;
        $queryType->created_by = Auth::id();
        $queryType->save();
        flash()->success($queryType->name.' Query Type created successfully');
    	return redirect('query-type');
    }

    public function edit($id)
    {
    	$queryType = QueryType::find($id);
    	return view('query_type.edit', compact('queryType'));
    }
    
    public function update(Request $request, $id)
    {
    	$queryType = QueryType::find($id);
    	$input = Input::all();
	    $rules = [
	    	'name' => 'required|unique:query_types,name,'.$queryType->id,
	    	'status' => 'required',
	    ];
	    $messages = [
            'name.required' => 'The Query Type field is required.',
            'name.unique' => 'The Query Type already exist.'
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $queryType->name = $request->name;
        $queryType->status = $request->status;
        $queryType->updated_by = Auth::id();
        $queryType->save();
        flash()->success($queryType->name.' Query Type updated successfully');
    	return redirect('query-type');
    }
}
