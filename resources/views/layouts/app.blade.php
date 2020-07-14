<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>MYOL</title>
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('assets/css/_all-skins.min.css') }}">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  	<style type="text/css">
        .alert {
            padding: 2px; 
            margin-bottom: 5px;
        }

        .required:after{ 
	        content:'*'; 
	        color:red; 
	        padding-left:5px;
	    }

      .skin-blue .main-header .navbar {
          /*background-color: #38418E;*/
          background-color: #1E1F4E;
        }
    </style>

     @yield('style')
</head>

<body class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">
  		<header class="main-header">
    		<nav class="navbar navbar-static-top">
      			<div class="container">

        			<div class="navbar-header">
          				<a href="{{ url('/') }}" class="navbar-brand"><b>Sheba</b> CRM</a>
          				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            				<i class="fa fa-bars"></i>
          				</button>
        			</div>
        			@if (Auth::guest())
			        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
			          	<ul class="nav navbar-nav">
                    <li class="active"><a href="{{ url('/login') }}"> <i class="fa fa-sign-in"></i> Login <span class="sr-only">(current)</span></a></li> 
			            	<!-- <li class="active"><a href="{{ url('/register') }}"> <i class="fa fa-sign-in"></i> Registration <span class="sr-only">(current)</span></a></li>  -->
			          	</ul>
			        </div>
        			@else
        			<div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          				<ul class="nav navbar-nav">
            				<!-- <li class="active"><a href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a></li> -->
                    
                    <!-- <li {{ ( Request::is('division') || Request::is('division/*') || Request::is('district') || Request::is('district/*') || Request::is('police-station') || Request::is('police-station/*') ? 'class=active' : '' ) }} class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Area <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                        <li {{ ( Request::is('division') || Request::is('division/*') ? 'class=active' : '' ) }} ><a href="{{ url('/division') }}">Division</a></li>
                        <li {{ ( Request::is('district') || Request::is('district/*') ? 'class=active' : '' ) }} ><a href="{{ url('/district') }}">District</a></li>
                      </ul>
                    </li> -->

            		<li {{ ( Request::is('user') || Request::is('user/*') ? 'class=active' : '' ) }} ><a href="{{ url('/user') }}">User</a></li>
                    <li {{ ( Request::is('query-type') || Request::is('query-type/*') ? 'class=active' : '' ) }} ><a href="{{ url('/query-type') }}">Query Type</a></li>
                    <li {{ ( Request::is('master-category') || Request::is('master-category/*') ? 'class=active' : '' ) }} ><a href="{{ url('/master-category') }}">Master Category</a></li>
                    <li {{ ( Request::is('category') || Request::is('category/*') ? 'class=active' : '' ) }} ><a href="{{ url('/category') }}">Category</a></li>
                    <li {{ ( Request::is('sub-category') || Request::is('sub-category/*') ? 'class=active' : '' ) }} ><a href="{{ url('/sub-category') }}">Sub Category</a></li>
                    <!-- <li {{ ( Request::is('ticket-status') || Request::is('ticket-status/*') ? 'class=active' : '' ) }} ><a href="{{ url('/ticket-status') }}">Ticket Status</a></li>
                    <li {{ ( Request::is('ticket') || Request::is('ticket/*') ? 'class=active' : '' ) }} ><a href="{{ url('/ticket') }}">Ticket</a></li> -->

                    <li {{ ( Request::is('select') || Request::is('select/*') ? 'class=active' : '' ) }} ><a href="{{ url('/select') }}">Menu</a></li>
                    <li {{ ( Request::is('option') || Request::is('option/*') ? 'class=active' : '' ) }} ><a href="{{ url('/option') }}">Menu Option</a></li>

                    <li {{ ( Request::is('report') || Request::is('report/*') ? 'class=active' : '' ) }} class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Report <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                        
                        <li><a href="{{ url('/report/crm-form') }}">CRM Report</a></li>
                        @can('sheba_admin-access')
                        <li><a href="{{ url('/report/crm-form-excel') }}">CRM Report Download (xlsx, csv, xls)</a></li>
                        @endcan
                        
                      </ul>
                    </li>

                    @can('agent-access')
                     <!--  <li {{ ( Request::is('crm') || Request::is('crm/*') ? 'class=active' : '' ) }} ><a href="{{ url('/crm') }}">CRM</a></li>
                      <li {{ ( Request::is('sms-send') || Request::is('sms-send/*') ? 'class=active' : '' ) }} ><a href="{{ url('/sms-send') }}">SMS</a></li> -->
                    @endcan
                    @if(Auth::id() == 5)
                      <!-- <li {{ ( Request::is('crm') || Request::is('crm/*') ? 'class=active' : '' ) }} ><a href="{{ url('/crm') }}">CRM</a></li> -->
                    @endif 

            				<li class="dropdown user user-menu">
              					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          @if(isset(Auth::user()->image))
                              <img src="{{ asset('public/uploads/'.Auth::user()->image) }}" class="user-image" alt="User Image">
                          @else
                              <img src="{{ asset('assets/images/user.png') }}" class="user-image" alt="User Image">
                          @endif
                					
                					<span class="hidden-xs">{{ Auth::user()->name }}</span>
              					</a>
              					<ul class="dropdown-menu">
                					<li class="user-header">
                              @if(isset(Auth::user()->image))
                                <img src="{{ asset('public/uploads/'.Auth::user()->image) }}" class="img-circle" alt="User Image">
                              @else
                                  <img src="{{ asset('assets/images/user.png') }}" class="img-circle" alt="User Image">
                              @endif
	                  					
	                  					<p>
	                    					{{ Auth::user()->name }}
	                  					</p>
                					</li>
					                <li class="user-footer">
					                  <div class="pull-left">
					                    <a href="{{ url('/logout') }}" class="btn btn-danger btn-flat">Sign out</a>
					                  </div>
					                  <div class="pull-right">
                              <!-- <a href="{{ url('/profile') }}" class="btn btn-default btn-flat">Profile</a> -->
					                  </div>
					                </li>
              					</ul>
            				</li>
          				</ul>
                  <!-- <form class="navbar-form navbar-left" role="search" method="post" >
                    <div class="form-group">
                      <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                  </form> -->
                  <!-- {!! Form::open(['url' => 'search', 'method' => 'post', 'class' => 'navbar-form navbar-left']) !!}
                    <div class="form-group">
                      {!! Form::text('mobile_or_code', null, ['class' => 'form-control', 'placeholder' => 'Search Mobile or Code', 'autocomplete' => 'off', 'id' => 'navbar-search-input', 'required' => 'required']) !!}
                    </div>
                    {!! Form::submit('Submit', ['class' => 'btn btn-success btn-flat']) !!}
                  {!! Form::close() !!} -->
        			</div>
         			@endif
      			</div>
    		</nav>
  		</header>

  		

  		<div class="content-wrapper">
  			<div class="container">
		        <div class="col-sm-8 col-sm-offset-2">
		            @include('flash::message')
		        </div>
		    </div>

    		
       		@yield('content')
    		
  		</div>
  
 		<footer class="main-footer">
    		<div class="container">
      			<div class="pull-right hidden-xs">
        			<b>Version</b> 1.0
      			</div>
      			<strong>Copyright &copy; {{ date('Y') }} <a href="http://myolbd.com" target="_blank">MY Outsourcing Limited</a>.</strong> All rights reserved.
    		</div>
  		</footer>
	</div>

	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('assets/js/fastclick.js') }}"></script>
	<script src="{{ asset('assets/js/script.min.js') }}"></script>
	<!-- <script src="{{ asset('assets/js/demo.js') }}"></script> -->
	@yield('script')
</body>
</html>
