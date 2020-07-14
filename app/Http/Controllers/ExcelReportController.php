<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Crm;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Excel;

class ExcelReportController extends Controller
{
	public function __construct()
    {
    	$this->middleware('auth');
    }
    
	public function crmFormExcel()
    {

    	return view('report.crm.form_excel');
    }

    public function crmShowExcel(Request $request)
    {
    	// return $request->all();
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $startDateTime = $request->start_date . ' 00:00:00';
        $endDateTime = $request->end_date . ' 23:59:59';
        $type = $request->type;

        Excel::create('CRM_'.$startDate.'to'.$endDate, function($excel) use ($startDateTime, $endDateTime, $type) {

            $excel->sheet('Sheet1', function($sheet) use ($startDateTime, $endDateTime, $type) {
                
                $crms = Crm::whereBetween('created_at', [$startDateTime, $endDateTime])->get();

                $arr =array();
                foreach($crms as $crm) {
                	if (isset($crm->category->name)) {
                        $category = $crm->category->name;
                    } else {
                        $category = null;
                    }

                    if (isset($crm->masterCategory->name)) {
                        $masterCategory = $crm->masterCategory->name;
                    } else {
                        $masterCategory = null;
                    }

                    if (isset($crm->queryType->name)) {
                        $queryType = $crm->queryType->name;
                    } else {
                        $queryType = null;
                    }
                   
                    $data =  array($crm->agent, $crm->phone_number, $crm->customer_name, $crm->customer_email, $crm->location, $crm->address, $crm->channel, $crm->query_link, $queryType, $masterCategory, $category, $crm->service_type, $crm->service_request, $crm->service_solution, $crm->service_feedback, $crm->service_budget, $crm->ord_or_comp_id, $crm->follow_up_date, $crm->order_channel, $crm->reason_of_call, $crm->call_detail, $crm->call_solution, $crm->app_name, $crm->app_rating, $crm->review_type, $crm->review_detail, $crm->created_at);
                    array_push($arr, $data);
                }
                
                //set the titles
                $sheet->fromArray($arr,null,'A1',false,false)->prependRow(array(
                        'Agent', 'Phone Number', 'Customer Name', 'Customer Email', 'Location', 'Address', 'Channel', 'Query Link', 'Query Type', 'Master Category', 'Category', 'Service Type', 'Service Request', 'Service Solution', 'Service Feedback', 'Service Budget', 'Order or Complain ID', 'Follow up Date', 'Order Channel', 'Reason of Call', 'Call Detail', 'Call Solution', 'App Name', 'App Rating', 'Review Type', 'Review Detail', 'Created At'
                    )

                );

            });

        })->export($type);
    }

    public function ticketFormExcel()
    {
        return view('report.ticket.form_excel');
    }

    public function ticketShowExcel(Request $request)
    {   //return $request->all();
        $startDate = $request->start_date.' 00:00:00';
        $endDate = $request->end_date.' 23:59:59';
        $type = $request->type;
        Excel::create('Ticket_from_'.$request->start_date.'_to_'.$request->end_date, function($excel) use ($startDate,  $endDate, $type) {

            $excel->sheet('Sheet1', function($sheet) use ($startDate,  $endDate, $type) {

                $userIdVision = [2, 3];
                $userIdTranscom = [8, 9, 10, 11];
                $userIdAllAccess = [1, 4, 5, 6, 7];

                if (in_array(Auth::id(), $userIdVision)) {

                    $tickets = Ticket::with(['assigned', 'ticketType', 'ticketStatus'])->where('sources_of_purchase', 'Vision')->whereBetween('updated_at', [$startDate, $endDate])->get();

                } else if (in_array(Auth::id(), $userIdTranscom)) {

                    $tickets = Ticket::with(['assigned', 'ticketType', 'ticketStatus'])->where('sources_of_purchase', 'Transcom')->whereBetween('updated_at', [$startDate, $endDate])->get();

                } else if (in_array(Auth::id(), $userIdAllAccess)) {

                    $tickets = Ticket::with(['assigned', 'ticketType', 'ticketStatus'])->whereBetween('updated_at', [$startDate, $endDate])->get();

                } else {
                    
                    // $tickets = Ticket::with(['assigned', 'ticketType', 'ticketStatus'])->whereBetween('updated_at', [$startDate, $endDate])->get();
                    return view('errors.forbidden');
                }

                

                $arr =array();
                foreach($tickets as $ticket) {
                    if (isset($ticket->assigned->name)) {
                        $assigned = $ticket->assigned->name;
                    } else {
                        $assigned = null;
                    }
                    if (isset($ticket->ticketType->name)) {
                        $ticketType = $ticket->ticketType->name;
                    } else {
                        $ticketType = null;
                    }
                    if (isset($ticket->ticketStatus->name)) {
                        $ticketStatus = $ticket->ticketStatus->name;
                    } else {
                        $ticketStatus = null;
                    }
                    if (isset($ticket->createdBy->name)) {
                        $createdBy = $ticket->createdBy->name;
                    } else {
                        $createdBy = null;
                    }
                    if (isset($ticket->updatedBy->name)) {
                        $updatedBy = $ticket->updatedBy->name;
                    } else {
                        $updatedBy = null;
                    }
                    if (isset($ticket->panelFeedBackBy->name)) {
                        $panelFeedBackBy = $ticket->panelFeedBackBy->name;
                    } else {
                        $panelFeedBackBy = null;
                    }
                    if (isset($ticket->agentClosedBy->name)) {
                        $agentClosedBy = $ticket->agentClosedBy->name;
                    } else {
                        $agentClosedBy = null;
                    }
                    if (isset($ticket->division->name)) {
                        $division = $ticket->division->name;
                    } else {
                        $division = null;
                    }
                    if (isset($ticket->district->name)) {
                        $district = $ticket->district->name;
                    } else {
                        $district = null;
                    }

                    $data =  array($ticket->id, $ticket->subject, $assigned, $ticketType, $ticketStatus, $ticket->phone_number, $ticket->customer_name, $ticket->customer_address, $district, $division, $ticket->product_model, $ticket->sources_of_purchase, $ticket->outlet_ref_num, $ticket->usage_purpose, $ticket->date_of_purchase, $ticket->verbatim_or_issue, $ticket->created_at, $ticket->updated_at, $createdBy, $updatedBy);
                    array_push($arr, $data);
                }
                
                //set the titles
                $sheet->fromArray($arr,null,'A1',false,false)->prependRow(array(
                        'TID', 'Subject', 'Assigned', 'Ticket Type', 'Ticket Status', 'Phone Number', 'Customer Name', 'Customer Address', 'District', 'Division', 'Product Model', 'Sources of Purchase', 'Outlet Ref. Num.', 'Usage Purpose', 'Date of Purchase', 'Remarks', 'Created At', 'Updated At', 'Created By', 'Updated By'
                    )

                );

            });

        })->export($type);
    }
}
