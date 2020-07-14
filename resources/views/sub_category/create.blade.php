@extends('layouts.app')

@section('content')
<div class="container">
    <section class="content">
        <div class="row">
        	<div class="col-md-8 col-sm-offset-2">
            	<div class="box box-success">
                	<div class="box-header with-border">
                    	<h3 class="box-title">Sub Category</h3> 
                	</div>
                	<div class="box-body">

                		<div class="col-sm-12">
    						
    						<div class="card">
    							<div class="card-header">
    								<h3 class="text-center"><i class="fa fa-pencil"></i> Create Form of <code><b>Sub Category</b></code> </h3>
    							</div>
    							<div class="card-body">
    						  		
    								@include('sub_category._form')

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

@section('script')
<script type="text/javascript">

    $(function() {
            $('#master_category_id').change(function() {
                var masterCategoryId = $(this).val();
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

        function resetField(id, placeholder) {
            $('#' + id).empty();
            $('#' + id).append('<option value="">'+ placeholder +'</option>');
        }

</script>    
@endsection