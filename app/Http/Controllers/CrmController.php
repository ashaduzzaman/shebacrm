<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Option;
use App\Models\QueryType;
use App\Models\MasterCategory;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Crm;

class CrmController extends Controller
{
    public function create(Request $request)
    {
        
        $locationList  = Option::where('select_id', 1)->where('status', 'Active')->orderBy('name', 'asc')->pluck('name', 'name');
        $channelList  = Option::where('select_id', 2)->where('status', 'Active')->orderBy('name', 'asc')->pluck('name', 'name');
        $serviceTypeList  = Option::where('select_id', 3)->where('status', 'Active')->orderBy('name', 'asc')->pluck('name', 'name');
        $serviceSolutionList  = Option::where('select_id', 4)->where('status', 'Active')->pluck('name', 'name');
        $reasonOfCallList  = Option::where('select_id', 5)->where('status', 'Active')->pluck('name', 'name');
        $appNameList  = Option::where('select_id', 6)->where('status', 'Active')->pluck('name', 'name');
        $appRatingList  = Option::where('select_id', 7)->where('status', 'Active')->pluck('name', 'name');
        $reviewTypeList  = Option::where('select_id', 8)->where('status', 'Active')->pluck('name', 'name');
        $queryTypeList = QueryType::where('status', 'Active')->orderBy('name', 'asc')->pluck('name', 'id');
        $masterCategoryList = MasterCategory::where('status', 'Active')->orderBy('name', 'asc')->pluck('name', 'id');
        // $categoryList = Category::orderBy('name', 'asc')->pluck('name', 'id');
        $phone_number = substr($request->phone_number, -11);
        $phoneNumber = $phone_number;
        $agent = $request->agent;

        $crmLast = Crm::whereIn('phone_number', [substr($request->phone_number, -11), substr($request->phone_number, -10)])->orderBy('id', 'desc')->first();
        $crmList = Crm::whereIn('phone_number', [substr($request->phone_number, -11), substr($request->phone_number, -10)])->orderBy('id', 'desc')->take(5)->get();
        logger($crmList);

        return view('crm.create', compact('locationList', 'channelList', 'serviceTypeList', 'serviceSolutionList', 'reasonOfCallList', 'appNameList', 'appRatingList', 'reviewTypeList', 'queryTypeList', 'masterCategoryList', 'phoneNumber', 'agent', 'crmLast','crmList'));
    }

    public function getCategory(Request $request)
    {   
        $categories = Category::where('master_category_id', $request->master_category_id)->pluck('name', 'id');

        return response()->json($categories);
    }

    public function getSubCategory(Request $request)
    {   
        $subCategories = SubCategory::where('category_id', $request->category_id)->pluck('name', 'id');

        return response()->json($subCategories);
    }

    public function store(Request $request)
    {
        $crm = new Crm;
        $crm->phone_number = $request->phone_number;
        $crm->agent = $request->agent;
        $crm->customer_name = $request->customer_name;
        $crm->customer_email = $request->customer_email;
        $crm->location = $request->location;
        $crm->address = $request->address;
        $crm->channel = $request->channel;
        $crm->query_link = $request->query_link;
        $crm->query_type_id = $request->query_type_id;
        $crm->master_category_id = $request->master_category_id;
        $crm->category_id = $request->category_id;
        $crm->sub_category_id = $request->sub_category_id;
        $crm->service_type = $request->service_type;
        $crm->service_request = $request->service_request;
        $crm->service_solution = $request->service_solution;
        $crm->service_feedback = $request->service_feedback;
        $crm->service_budget = $request->service_budget;
        $crm->ord_or_comp_id = $request->ord_or_comp_id;
        if ($request->follow_up_date == null) {
            $crm->follow_up_date = null;
        } else {
            $crm->follow_up_date = $request->follow_up_date;
        }
        $crm->order_channel = $request->order_channel;
        $crm->reason_of_call = $request->reason_of_call;
        $crm->call_detail = $request->call_detail;
        $crm->call_solution = $request->call_solution;
        $crm->app_name = $request->app_name;
        $crm->app_rating = $request->app_rating;
        $crm->review_type = $request->review_type;
        $crm->review_detail = $request->review_detail;
        $crm->lead_id = $request->lead_id;
        $crm->save(); 

        flash()->success($request->phone_number.' information created successfully');
        
        return redirect()->back();
    }
}
