@extends('layouts.app')

@section('content')
<div class="container">
    <section class="content">
        <div class="row">
        	<div class="col-md-12">
            	<div class="box box-primary">
                	<div class="box-header">
                    	<h3 class="box-title">User List</h3> 
                    	<!-- <div class="box-tools pull-right">
                    		<a href="{{ url('ticket-status/create') }}" class="btn btn-primary btn-flat"> <i class="fa fa-plus"></i> Create Ticket Status</a>
                    	</div> -->
                	</div>
                	<div class="box-body">
                        <div class="table-responsive"> 
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <!-- <th>Department or Ticket Status</th> -->
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        {{-- @can('ticket_admin-access') --}}
                                            <th>Edit</th>
                                        {{-- @endcan --}}
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 0;
                                ?>
                                @foreach($users as $user)
                                    <?php
                                        if ($user->role == 'super_admin') {
                                            $role = "Super Admin";
                                        } else if ($user->role == 'sheba_admin') {
                                            $role = "Sheba Admin";
                                        } else if ($user->role == 'agent') {
                                            $role = "Agent";
                                        }else {
                                            $role = "User";
                                        }
                                    ?>
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $role }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>{{ $user->address }}</td>
                                        {{-- @can('ticket_admin-access') --}}
                                            <td><a href='{{"user/$user->id/edit"}}' class="btn btn-success btn-sm">Change Role</a></td>
                                        {{-- @endcan --}}
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