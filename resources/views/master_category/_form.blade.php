@if(isset($masterCategory))
    {!! Form::model($masterCategory, ['url' => "master-category/$masterCategory->id", 'method' => 'put', 'class' => 'form-horizontal']) !!}
@else
    {!! Form::open(['url' => 'master-category', 'method' => 'post', 'class' => 'form-horizontal']) !!}
@endif

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Master Category', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Master Category', 'autocomplete' => 'off']) !!}
        <span class="text-danger">
		    {{ $errors->first('name') }}
	    </span>
    </div>
</div>

@if(isset($masterCategory))
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control', 'placeholder' => 'Select Status']) !!}
        <span class="text-danger">
		    {{ $errors->first('status') }}
	    </span>
    </div>
</div>
@endif

<div class="box-footer">
	<!-- <button type="button" class="btn btn-default">Cancel</button> -->
	<a href="{{ url('/master-category') }}" class="btn btn-default">Cancel</a>
	@if(isset($masterCategory))
	    {!! Form::button('Submit', ['class' => 'btn btn-success pull-right', 'data-toggle' => 'modal', 'data-target' => '#master_category_update']) !!}
	@else
	    {!! Form::button('Submit', ['class' => 'btn btn-primary pull-right', 'data-toggle' => 'modal', 'data-target' => '#master_category_create']) !!}
	@endif
	
</div>

<div class="modal modal-info fade" id="master_category_create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Confirmation Message</h4>
			</div>
			<div class="modal-body">
				<h3>Want to Create Master Category?</h3>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-outline">Create Master Category</button>
			</div>
		</div>
	</div>
</div>


<div class="modal modal-warning fade" id="master_category_update">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Confirmation Message</h4>
			</div>
			<div class="modal-body">
				<h3>Want to Update Master Category?</h3>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-outline">Update Master Category</button>
			</div>
		</div>
	</div>
</div>

{!! Form::close() !!}