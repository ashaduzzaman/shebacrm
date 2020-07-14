<!DOCTYPE html>
<html>
<head>
	<title>MYOL</title>
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
   
	<style type="text/css">
		.box-header {
		    padding: 0px;
		}
		.box-body {
			padding: 0px;
		}
		.box-header .box-title {
			display: block;
		}
		.box-title {
			text-align: center;
		}

		.input-group-addon {
		    min-width:160px;
		    /*min-width:200px;*/
		    /*min-width:220px;*/
		    /*text-align:left;*/
		}
		.alert {
            padding: 2px; 
            margin-bottom: 5px;
        }

        .greenG {
        	background-color: #28a745; color: #FFFFFF;
        }
        .blue {
        	background-color: #007bff; color: #FFFFFF;
        	/*background-color: #59a3ef; color: #FFFFFF;*/
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #3c8dbc;
            border-color: #367fa9;
            padding: 1px 10px;
            color: #fff;
        }

	</style>
</head>
<body>
	<div class="container-fluid">

	    <div class="container">
	        <div class="col-sm-8 col-sm-offset-2">
	            @include('flash::message')
	        </div>
	    </div>

		<div class="box box-success">
	    	<div class="box-header with-border">
	        	<h3 class="box-title">Sheba CRM <small>Phone Number:</small><code>{{ $phoneNumber }}</code> <small>Agent:</small> <code>{{ $agent }}</code></h3> 
	    	</div>
	    	<div class="box-body">
	    		{!! Form::model($crmLast, ['url' => 'crm', 'method' => 'post']) !!}

				{{-- {!! Form::open(['url' => 'crm', 'method' => 'post', 'class' => '']) !!} --}}

				<input type="hidden" name="phone_number" value="{{ $phoneNumber }}" class="form-control">
				<input type="hidden" name="agent" value="{{ $agent }}" class="form-control">

				<div class="row">
		    		<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Customer / SP Name</span>
			      			{!! Form::text('customer_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Customer Name', 'autocomplete' => 'off']) !!}
			    		</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Customer / SP Email</span>
			      			{!! Form::text('customer_email', null, ['class' => 'form-control', 'placeholder' => 'Enter Customer Email', 'autocomplete' => 'off']) !!}
			    		</div>
					</div>
				</div>

				<div class="row">
		    		<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Location</span>
			      			{!! Form::select('location', $locationList, null, ['class' => 'form-control', 'placeholder' => 'Select Location', 'required']) !!}
			    		</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Address</span>
			      			{!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Enter Address', 'autocomplete' => 'off']) !!}
			    		</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Channel</span>
			      			{!! Form::select('channel', $channelList, null, ['class' => 'form-control', 'placeholder' => 'Select Channel', 'required']) !!}
			    		</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Query Link</span>
			      			{!! Form::text('query_link', null, ['class' => 'form-control', 'placeholder' => 'Enter Query Link', 'autocomplete' => 'off']) !!}
			    		</div>
					</div>
				</div>

				<div class="row">
		    		<div class="col-sm-6">
			    		<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Query Type</span>
			      			{!! Form::select('query_type_id', $queryTypeList, null, ['class' => 'form-control select2', 'placeholder' => 'Select Query Type', 'id' => 'query_type_id','required']) !!}
			    		</div>
					</div>
				</div>

				<div class="row">
		    		<div class="col-sm-6">
			    		<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Master Category</span>
			      			{!! Form::select('master_category_id', $masterCategoryList, null, ['class' => 'form-control select2', 'placeholder' => 'Select Master Category', 'id' => 'master_category_id']) !!}
			    		</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Category</span>
			      			{!! Form::select('category_id', [], null, ['class' => 'form-control select2', 'placeholder' => 'Select Category', 'id' => 'category_id']) !!}
			    		</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Sub Category</span>
			      			{!! Form::select('sub_category_id', [], null, ['class' => 'form-control select2', 'placeholder' => 'Select Category', 'id' => 'sub_category_id']) !!}
			    		</div>
					</div>
				</div>

				<hr style="margin-top: 5px; margin-bottom: 0px; border: 0;border-top: 1px solid #000;">

			<div id="query-type-field" style="display: none;">
					<div class="row">
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Service Type</span>
			      			{!! Form::select('service_type', $serviceTypeList, null, ['class' => 'form-control', 'placeholder' => 'Select Service Type']) !!}
			    		</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Service Request</span>
			      			{!! Form::text('service_request', null, ['class' => 'form-control', 'placeholder' => 'Enter Service Request', 'autocomplete' => 'off']) !!}
			    		</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Service Solution</span>
			      			{!! Form::select('service_solution', $serviceSolutionList, null, ['class' => 'form-control', 'placeholder' => 'Select Service Type']) !!}
			    		</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Service Feedback</span>
			      			{!! Form::text('service_feedback', null, ['class' => 'form-control', 'placeholder' => 'Enter Service Feedback', 'autocomplete' => 'off']) !!}
			    		</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Service Budget</span>
			      			{!! Form::text('service_budget', null, ['class' => 'form-control', 'placeholder' => 'Enter Service Budget', 'autocomplete' => 'off']) !!}
			    		</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Order / Complain ID</span>
			      			{!! Form::text('ord_or_comp_id', null, ['class' => 'form-control', 'placeholder' => 'Enter Order or Complain ID', 'autocomplete' => 'off']) !!}
			    		</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
			    		<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Follow up Date</span>
			      			{!! Form::text('follow_up_date', null, ['class' => 'form-control', 'placeholder' => 'YYYY-MM-DD', 'autocomplete' => 'off', 'id' => 'follow_up_date']) !!}
			    		</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Order Channel</span>
			      			{!! Form::text('order_channel', null, ['class' => 'form-control', 'placeholder' => 'Enter Order Channel', 'autocomplete' => 'off']) !!}
			    		</div>
					</div>
				</div>
				<hr style="margin-top: 5px; margin-bottom: 0px; border: 0;border-top: 1px solid #000;">
			</div>


				<div class="row">
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Reason of Call</span>
			      			{!! Form::select('reason_of_call', $reasonOfCallList, null, ['class' => 'form-control select2', 'placeholder' => 'Select Reason of Call']) !!}
			    		</div>
					</div>
					
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Call Detail</span>
			      			{!! Form::text('call_detail', null, ['class' => 'form-control', 'placeholder' => 'Enter Call Detail', 'autocomplete' => 'off']) !!}
			    		</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Call Solution</span>
			      			{!! Form::text('call_solution', null, ['class' => 'form-control', 'placeholder' => 'Enter Call Solution', 'autocomplete' => 'off']) !!}
			    		</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">App Name</span>
			      			{!! Form::select('app_name', $appNameList, null, ['class' => 'form-control', 'placeholder' => 'Select App Name']) !!}
			    		</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">App Rating</span>
			      			{!! Form::select('app_rating', $appRatingList, null, ['class' => 'form-control', 'placeholder' => 'Select App Rating']) !!}
			    		</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Review Type</span>
			      			{!! Form::select('review_type', $reviewTypeList, null, ['class' => 'form-control', 'placeholder' => 'Select App Review Type']) !!}
			    		</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #1E1F4E; color: #FFFFFF;">Review Detail</span>
			      			{!! Form::text('review_detail', null, ['class' => 'form-control', 'placeholder' => 'Enter App Review Detail', 'autocomplete' => 'off']) !!}
			    		</div>
					</div>
				</div>

				<!-- <div class="row">
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #28a745; color: #FFFFFF;">Location <span style="color: red; font-size: 18px;">*</span></span>
			      			{!! Form::select('location', $locationList, null, ['class' => 'form-control', 'placeholder' => 'Select Location', 'required' => 'required']) !!}
			    		</div>
					</div>
		    		<div class="col-sm-6">
			    		<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #28a745; color: #FFFFFF;">Source of Call</span>
			      			{!! Form::text('product_model', null, ['class' => 'form-control', 'placeholder' => 'Source of Call', 'list' => 'datalist_product_model']) !!}
			      			<datalist id="datalist_product_model">
                            	@foreach($locationList as $productModel)
							    	<option value="{{ $productModel }}">
							    @endforeach
							</datalist>
			    		</div>
					</div>
				</div> -->
				<div class="row">
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
						{!! Form::button('Submit', ['class' => 'btn btn-primary btn-block', 'data-toggle' => 'modal', 'data-target' => '#crm_create', 'style' => 'margin-top: 10px;']) !!}
					</div>
					<div class="col-sm-4"></div>

				</div>

				<div class="row">
					{{-- <div class="container"> --}}
						<div class="table-responsive" style="margin-top:20px;">
							<table class="table table-bordered">
								<thead class="bg-green">
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Address</th>
									<th>Phone Number</th>
									<th>Reason of Call</th>
								</tr>
								</thead>
								<tbody>
									@php
										$count = 1
									@endphp
									@foreach ($crmList as $crm)
									
									<tr>
										<td>{{ $count++ }}</td>
										<td>{{ $crm->customer_name }}</td>
										<td>{{ $crm->address }}</td>
										<td>{{ $crm->phone_number }}</td>
										<td>{{ $crm->reason_of_call }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						{{-- </div> --}}
					</div>
				</div>
				<div class="modal modal-info fade" id="crm_create">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Confirmation Message</h4>
                            </div>
                            <div class="modal-body">
                                <h3>Want to Store CRM Information?</h3>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button> -->
                                <button type="submit" class="btn btn-outline btn-block">Submit CRM Information</button>
                            </div>
                        </div>
                    </div>
                </div>

				{!! Form::close() !!}
	    	</div>
	    </div>
	        	
	    
	</div>

	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<!-- <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script> -->
	<script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('assets/js/select2.full.min.js') }}"></script>

	

	<script type="text/javascript">
		$('#follow_up_date').datepicker({
            format:'yyyy-mm-dd',
            autoclose: true
        });

        
		var masterCatId = '';
        $(function() {
            $('#master_category_id').change(function() {
                var masterCategoryId = $(this).val();
				masterCatId = masterCategoryId;
                getCategory(masterCategoryId);
            });
        });

        function getCategory(masterCategoryId) {
            
            resetField('category_id', 'Select Category Data');
            var url = '{{ url("crm/get-category")}}';
            $.get(url+'?master_category_id='+masterCategoryId, function (response) {
                $.map( response, function( name, id ) {
                    $('#category_id').append('<option value="'+ id +'">' + name + '</option>');
                });
            });
        }

		$(function() {
            $('#category_id').change(function() {
                var categoryId = $(this).val();
                getSubCategory(categoryId);
            });
        });

		function getSubCategory(categoryId) {
            
            resetField('sub_category_id', 'Select Sub Category Data');
            var url = '{{ url("crm/get-sub-category")}}';
            $.get(url+'?category_id='+categoryId, function (response) {
                $.map( response, function( name, id ) {
                    $('#sub_category_id').append('<option value="'+ id +'">' + name + '</option>');
                });
            });
        }

        function resetField(id, placeholder) {
            $('#' + id).empty();
            $('#' + id).append('<option value="">'+ placeholder +'</option>');
        }




        @if(isset($crmLast))

			var mCatId = '{{ $crmLast->master_category_id }}';
			var catId = '{{ $crmLast->category_id }}';

			jQuery.ajaxSetup({async:false});
			
			getCategory(mCatId);
			$('#category_id').val(catId);

			 jQuery.ajaxSetup({async:true});

		@endif

		$(function () {
            $('.select2').select2();
        });

		$(function() {
			$('#query_type_id').change(function(){
				if( $(this).val()==="1" || $(this).val()==="2"){ // id of those query type must be 1 and 2 to be worked
				$("#query-type-field").show()                    // if need to change any query type in the database developer need to change those condition
				}												 // based on id in the database
				else{
				$("#query-type-field").hide()
				}
			});
		});

	</script>
</body>
</html>