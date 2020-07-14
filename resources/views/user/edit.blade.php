@extends('layouts.app')

@section('content')
<div class="container">
    <section class="content">
        <div class="row">
        	<div class="col-md-8 col-sm-offset-2">
            	<div class="box box-success">
                	<div class="box-header with-border">
                    	<h3 class="box-title">User</h3> 
                	</div>
                	<div class="box-body">

                		<div class="col-sm-12">
    						
    						<div class="card">
    							<div class="card-header">
    								<h3 class="text-center"><i class="fa fa-edit"></i> Edit Form of <code><b>User</b></code> </h3>
    							</div>
    							<div class="card-body">

								{!! Form::model($user, ['url' => "user/$user->id", 'method' => 'put', 'class' => 'form-horizontal']) !!}

									<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
									    {!! Form::label('name', 'Name', ['class' => 'required col-3 col-sm-3 control-label']) !!}
									    <div class="col-xs-9 col-sm-9">
									        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name', 'autocomplete' => 'off']) !!}
									        <span class="text-danger">
											    {{ $errors->first('name') }}
										    </span>
									    </div>
									</div>

									<div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
									    {!! Form::label('role', 'Role', ['class' => 'required col-3 col-sm-3 control-label']) !!}
									    <div class="col-xs-9 col-sm-9">
									        {!! Form::select('role', $roleList, null, ['class' => 'form-control', 'placeholder' => 'Select Role']) !!}
									        <span class="text-danger">
											    {{ $errors->first('role') }}
										    </span>
									    </div>
									</div>

									<div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
									    {!! Form::label('phone_number', 'Phone Number', ['class' => 'required col-3 col-sm-3 control-label']) !!}
									    <div class="col-xs-9 col-sm-9">
									        {!! Form::text('phone_number', null, ['class' => 'form-control', 'placeholder' => 'Enter Phone Number', 'autocomplete' => 'off']) !!}
									        <span class="text-danger">
											    {{ $errors->first('phone_number') }}
										    </span>
									    </div>
									</div>

									<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
									    {!! Form::label('address', 'Address', ['class' => 'col-3 col-sm-3 control-label']) !!}
									    <div class="col-xs-9 col-sm-9">
									        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Enter Address', 'autocomplete' => 'off']) !!}
									        <span class="text-danger">
											    {{ $errors->first('address') }}
										    </span>
									    </div>
									</div>


									<div class="box-footer">
										<a href="{{ url('/user') }}" class="btn btn-default">Cancel</a>
										{!! Form::button('Submit', ['class' => 'btn btn-success pull-right', 'data-toggle' => 'modal', 'data-target' => '#user_update']) !!}	
									</div>


									<div class="modal modal-warning fade" id="user_update">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<h4 class="modal-title">Confirmation Message</h4>
												</div>
												<div class="modal-body">
													<h3>Want to Update User?</h3>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-outline">Update User</button>
												</div>
											</div>
										</div>
									</div>

								{!! Form::close() !!}

    							</div>
    						</div>
    					</div>

                	</div>
          		</div>
        	</div>
      	</div>
    </section>
</div>
@endsection