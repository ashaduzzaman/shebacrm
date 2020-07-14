@if(isset($subCategory))
    {!! Form::model($subCategory, ['url' => "sub-category/$subCategory->id", 'method' => 'put', 'class' => 'form-horizontal']) !!}
@else
    {!! Form::open(['url' => 'sub-category', 'method' => 'post', 'class' => 'form-horizontal']) !!}
@endif

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Sub Category', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Sub Category', 'autocomplete' => 'off']) !!}
        <span class="text-danger">
		    {{ $errors->first('name') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('master_category_id') ? 'has-error' : ''}}">
    {!! Form::label('master_category_id', 'Master Category', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::select('master_category_id', $masterCategoryList, null, ['class' => 'form-control', 'placeholder' => 'Select Master Category']) !!}
        <span class="text-danger">
		    {{ $errors->first('master_category_id') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('master_category_id') ? 'has-error' : ''}}">
    {!! Form::label('category_id', 'Category', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::select('category_id', [], null, ['class' => 'form-control', 'placeholder' => 'Select Category', 'id' => 'category_id']) !!}
        <span class="text-danger">
		    {{ $errors->first('category_id') }}
	    </span>
    </div>
</div>

@if(isset($subCategory))
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
	<a href="{{ url('/sub-category') }}" class="btn btn-default">Cancel</a>
	@if(isset($subCategory))
	    {!! Form::button('Update', ['class' => 'btn btn-success pull-right', 'data-toggle' => 'modal', 'data-target' => '#sub_category_update']) !!}
	@else
	    {!! Form::button('Submit', ['class' => 'btn btn-primary pull-right', 'data-toggle' => 'modal', 'data-target' => '#sub_category_create']) !!}
	@endif
	
</div>

<div class="modal modal-info fade" id="sub_category_create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Confirmation Message</h4>
			</div>
			<div class="modal-body">
				<h3>Want to Create Sub Category?</h3>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-outline">Create Sub Category</button>
			</div>
		</div>
	</div>
</div>


<div class="modal modal-warning fade" id="sub_category_update">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Confirmation Message</h4>
			</div>
			<div class="modal-body">
				<h3>Want to Update Sub Category?</h3>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-outline">Update Sub Category</button>
			</div>
		</div>
	</div>
</div>

{!! Form::close() !!}