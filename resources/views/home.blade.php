@extends('layouts.app')

@section('content')
<div class="container">
    <section class="content">

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Dashboard</h3>
            </div>
            <div class="box-body" style="background-color: #b0ecf9">
                

                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-aqua"><i class="fa fa-clock-o"></i></span>
                                    <div class="info-box-content">
                                        <center><span class="info-box-text" style="font-size: 39px;">{{ date("h:i") }}</span></center>
                                        <center><span class="info-box-number" style="font-size: 18px;">{{ date("d/m/Y") }}</span></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-aqua"><i class="fa fa-phone"></i></span>
                                    <div class="info-box-content">
                                        <center><span class="info-box-text" style="font-size: 18px;">Total Ticket</span></center>
                                        <center><span class="info-box-number" style="font-size: 39px;">{{ '$ticketCount' }}</span></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-phone"></i></span>
                                    <div class="info-box-content">
                                        <center><span class="info-box-text" style="font-size: 18px;">Ticket Type</span></center>
                                        <center><span class="info-box-number" style="font-size: 39px;">{{ '$ticketTypeCount' }}</span></center>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- =========================================================== -->

                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="fa fa-hand-o-right"></i></span>
                                    <div class="info-box-content">
                                        <center><span class="info-box-text" style="font-size: 18px;">Ticket Status</span></center>
                                        <center><span class="info-box-number" style="font-size: 39px;">{{ '$ticketStatusCount' }}</span></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="fa fa-users"></i></span>
                                    <div class="info-box-content">
                                        <center><span class="info-box-text" style="font-size: 18px;">Users</span></center>
                                        <center><span class="info-box-number" style="font-size: 39px;">{{ '$userCount' }}</span></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="info-box bg-green">
                                    <!-- <span class="info-box-icon"><i class="fa fa-tty"></i></span> -->
                                    <span class="info-box-icon"><i class="fa fa-user"></i></span>
                                    <div class="info-box-content">
                                        <center><span class="info-box-text" style="font-size: 18px;">User Type</span></center>
                                        <center><span class="info-box-number" style="font-size: 33px;">{{ 3 }}</span></center>
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <!-- =========================================================== -->

                         <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon purple" style="background-color: #8E44AD; color: #fff !important;"><i class="fa fa-headphones"></i></span>
                                    <div class="info-box-content">
                                        <center><span class="info-box-text" style="font-size: 18px;">Marketing Ticket</span></center>
                                        <center><span class="info-box-number" style="font-size: 39px;">{{ '$ticketType1CountMar' }}</span></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon purple" style="background-color: #8E44AD; color: #fff !important;"><i class="fa fa-bell-o"></i></span>
                                    <div class="info-box-content">
                                        <center><span class="info-box-text" style="font-size: 18px;">Retailer Ticker</span></center>
                                        <center><span class="info-box-number" style="font-size: 33px;">{{ '$ticketType2CountRet' }}</span></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon purple" style="background-color: #8E44AD; color: #fff !important;"><i class="fa fa-bar-chart"></i></span>
                                    <div class="info-box-content">
                                        <center><span class="info-box-text" style="font-size: 18px;">Distributor Ticket</span></center>
                                        <center><span class="info-box-number" style="font-size: 33px;">{{ '$ticketType3CountDis' }}</span></center>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <!-- =========================================================== -->

                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="info-box bg-red">
                                    <span class="info-box-icon "><i class="fa fa-pause"></i></span>
                                    <div class="info-box-content">
                                        <center><span class="info-box-text" style="font-size: 18px;">Product Quality Ticket</span></center>
                                        <center><span class="info-box-number" style="font-size: 33px;">{{ '$ticketType4CountProQua' }}</span></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="info-box bg-red">
                                    <span class="info-box-icon "><i class="fa fa-arrow-right"></i></span>
                                    <div class="info-box-content">
                                        <center><span class="info-box-text" style="font-size: 18px;">Transportation Ticket</span></center>
                                        <center><span class="info-box-number" style="font-size: 33px;">{{ '$ticketType5CountTrans' }}</span></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="info-box bg-red">
                                    <span class="info-box-icon "><i class="fa fa-bullhorn"></i></span>
                                    <div class="info-box-content">
                                        <center><span class="info-box-text" style="font-size: 18px;">Distributorship Ticket</span></center>
                                        <center><span class="info-box-number" style="font-size: 33px;">{{ '$ticketType6CountDisShip' }}</span></center>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- =========================================================== -->

                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-export"></i></span>
                                    <div class="info-box-content">
                                        <center><span class="info-box-text" style="font-size: 18px;">Order Related</span></center>
                                        <center><span class="info-box-number" style="font-size: 39px;">{{ '$ticketType7CountOrder' }}</span></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-saved"></i></span>
                                    <div class="info-box-content">
                                        <center><span class="info-box-text" style="font-size: 18px;">Sponsorship or Event Ticket</span></center>
                                        <center><span class="info-box-number" style="font-size: 39px;">{{ '$ticketType8CountSpon' }}</span></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-download-alt"></i></span>
                                    <div class="info-box-content">
                                        <center><span class="info-box-text" style="font-size: 18px;">Area or Zone</span></center>
                                        <center><span class="info-box-number" style="font-size: 39px;">{{ '$area' }}</span></center>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- =========================================================== -->

                        <!-- Small boxes (Stat box) -->
                        <!-- <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="small-box bg-aqua" style="background-color: #008080 !important;">
                                    <div class="inner">
                                        <h3>{{ '$ticketType1CountLog' }}</h3>
                                        <p><b>Logistics Ticket</b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-files-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="small-box bg-aqua" style="background-color: #008080 !important;">
                                    <div class="inner">
                                        <h3>{{ '$ticketType2CountSal' }}</h3>
                                        <p><b>Sales Ticket</b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-clipboard"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="small-box bg-aqua" style="background-color: #008080 !important;">
                                    <div class="inner">
                                        <h3>{{ '$ticketType3CountAC' }}</h3>
                                        <p><b>AC (Other Brand) Ticket</b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- =========================================================== -->
                        
                        <!-- Small boxes (Stat box) -->
                        <!-- <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>{{ '$ticketType4CountEle' }}</h3>
                                        <p><b>TV/Electronics (Other Brand) Ticket</b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-hand-o-right"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>{{ '$ticketType5CountApp' }}</h3>
                                        <p><b>Appliances (Other Brand) Ticket</b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-anchor"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>{{ '$ticketType6CountSB' }}</h3>
                                        <p><b>Samsung Brand Ticket</b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-tablet"></i>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- =========================================================== -->

                        <div class="row">
                            <!-- <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="circle-tile ">
                                    <div class="circle-tile-heading green"><i class="fa fa-share fa-fw fa-3x"></i></div>
                                    <div class="circle-tile-content green" style="padding-top: 40px;">
                                        <div class="circle-tile-number text-faded" id="new_total" style="font-size: 32px;">{{ 22 }}</div>
                                        <div class="circle-tile-description text-faded"> <h4 style="margin-top: 0; margin-bottom: 0;"> Ticket </h4> </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="circle-tile ">
                                    <div class="circle-tile-heading blue"><i class="fa fa-calendar fa-fw fa-3x"></i></div>
                                    <div class="circle-tile-content blue" style="padding-top: 40px;">
                                        <div class="circle-tile-number text-faded" id=""  style="font-size: 32px;">{{ 8 }}</div>
                                        <div class="circle-tile-description text-faded"> <h4 style="margin-top: 0; margin-bottom: 0;"> Division </h4></div> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="circle-tile ">
                                    <div class="circle-tile-heading dark-blue"><i class="fa fa-check fa-fw fa-3x"></i></div>
                                    <div class="circle-tile-content dark-blue" style="padding-top: 40px;">
                                        <div class="circle-tile-number text-faded" id=""  style="font-size: 32px;">{{ 64 }}</div>
                                        <div class="circle-tile-description text-faded"> <h4 style="margin-top: 0; margin-bottom: 0;"> District </h4></div> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="circle-tile ">
                                    <div class="circle-tile-heading purple"><i class="fa fa-paper-plane fa-fw fa-3x"></i></div>
                                    <div class="circle-tile-content purple" style="padding-top: 40px;">
                                        <div class="circle-tile-number text-faded" id="answered_total"  style="font-size: 32px;">{{ 609 }}</div>
                                        <div class="circle-tile-description text-faded"> <h4 style="margin-top: 0; margin-bottom: 0;"> Police Station </h4></div> 
                                    </div>
                                </div>
                            </div> -->
                        </div>

                        <!-- =========================================================== -->





                       

            </div>
        </div>

    </section>
</div>
@endsection
