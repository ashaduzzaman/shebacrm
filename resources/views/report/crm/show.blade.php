@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<section class="content">
	    <div class="row">
	    	<div class="col-md-12">
	        	<div class="box box-primary">
	            	<div class="box-header">
	                	<h3 class="box-title">CRM Information From <i>{{ $startDate }}</i> To <i>{{ $endDate }}</i></h3>
	            	</div>
	            	<div class="box-body">
	                    <div class="table-responsive"> 
	                        <table id="example" class="table table-bordered table-striped">
	                            <thead>
	                                <tr>
	                                    <th>SL</th>
			                            <th>ID</th>
			                            <th>Agent</th>
			                            <th>Phone No</th>
			                            <th>Cus. Name</th>
			                            <th>Cus. Email</th>
			                            <th>Location</th>
			                            <th>Address</th>
			                            <th>Channel</th>
			                            <th>Query Link</th>
			                            <th>Query Type</th>
			                            <th>Master Category</th>
			                            <th>Category</th>
			                            <th>Service Type</th>
			                            <th>Service Request</th>
			                            <th>Service Solution</th>
			                            <th>Service Feedback</th>
			                            <th>Service Budget</th>
			                            <th>ord/comp ID</th>
			                            <th>Follow up Date</th>
			                            <th>Order Channel</th>
			                            <th>Reason of Call</th>
			                            <th>Call Detail</th>
			                            <th>Solution</th>
			                            <th>App Name</th>
			                            <th>Rating</th>
			                            <th>Review Type</th>
			                            <th>Review Detail</th>
			                            <th>CreatedAt</th>
		                            </tr>
	                            </thead>
	                            <tbody>
	                            <?php
	                                $i = 0;
	                            ?>
	                            @foreach($crms as $crm)
	                            	<?php
										$interval = date_diff(date_create(), date_create($crm->created_at));
										$crmAge = $interval->format("%yy, %mm, %dd");
									?>
	                                <tr>
	                                    <td>{{ ++$i }}</td>
			                            <td><b>{{ $crm->id }}</b></td>
			                            
			                            <td>{{ $crm->agent }}</td>
			                            <td>{{ $crm->phone_number }}</td>
			                            <td>{{ $crm->customer_name }}</td>
			                            <td>{{ $crm->customer_email }}</td>
			                            <td>{{ $crm->location }}</td>
			                            <td>{{ $crm->address }}</td>
			                            <td>{{ $crm->channel }}</td>
			                            <td>{{ $crm->query_link }}</td>
			                            @if(isset($crm->queryType->name))
	                                        <td>{{ $crm->queryType->name }}</td>
	                                    @else
	                                        <td></td>
	                                    @endif
			                            @if(isset($crm->masterCategory->name))
	                                        <td>{{ $crm->masterCategory->name }}</td>
	                                    @else
	                                        <td></td>
	                                    @endif
			                            @if(isset($crm->category->name))
	                                        <td>{{ $crm->category->name }}</td>
	                                    @else
	                                        <td></td>
	                                    @endif
			                            <td>{{ $crm->service_type }}</td>
			                            <td>{{ $crm->service_request }}</td>
			                            <td>{{ $crm->service_solution }}</td>
			                            <td>{{ $crm->service_feedback }}</td>
			                            <td>{{ $crm->service_budget }}</td>
			                            <td>{{ $crm->ord_or_comp_id }}</td>
			                            <td>{{ $crm->follow_up_date }}</td>
			                            <td>{{ $crm->order_channel }}</td>
			                            <td>{{ $crm->reason_of_call }}</td>
			                            <td>{{ $crm->call_detail }}</td>
			                            <td>{{ $crm->call_solution }}</td>
			                            <td>{{ $crm->app_name }}</td>
			                            <td>{{ $crm->app_rating }}</td>
			                            <td>{{ $crm->review_type }}</td>
			                            <td>{{ $crm->review_detail }}</td>
			                            <td>{{ $crm->created_at }}</td>
	                                </tr>
	                            @endforeach
	                            </tbody>
	                        </table>
	                    </div>
	            	</div>
	      		</div>
	    	</div>
	  	</div>
	</section>
</div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection