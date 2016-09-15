@extends('layouts.admin')
@section('content')
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Home</a></li>
		<li><a href="javascript:;">Dashboard</a></li>
		<li class="active">Dashboard v2</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Dashboard v2 <small>header small text goes here...</small></h1>
	<!-- end page-header -->
	<!-- begin row -->
	<div class="row">
		<!-- begin col-3 -->
		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-green">
				<div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
				<div class="stats-title">TODAY'S VISITS</div>
				<div class="stats-number">7,842,900</div>
				<div class="stats-progress progress">
					<div class="progress-bar" style="width: 70.1%;"></div>
				</div>
				<div class="stats-desc">Better than last week (70.1%)</div>
			</div>
		</div>
		<!-- end col-3 -->
		<!-- begin col-3 -->
		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-blue">
				<div class="stats-icon stats-icon-lg"><i class="fa fa-tags fa-fw"></i></div>
				<div class="stats-title">TODAY'S PROFIT</div>
				<div class="stats-number">180,200</div>
				<div class="stats-progress progress">
					<div class="progress-bar" style="width: 40.5%;"></div>
				</div>
				<div class="stats-desc">Better than last week (40.5%)</div>
			</div>
		</div>
		<!-- end col-3 -->
		<!-- begin col-3 -->
		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-purple">
				<div class="stats-icon stats-icon-lg"><i class="fa fa-shopping-cart fa-fw"></i></div>
				<div class="stats-title">NEW ORDERS</div>
				<div class="stats-number">38,900</div>
				<div class="stats-progress progress">
					<div class="progress-bar" style="width: 76.3%;"></div>
				</div>
				<div class="stats-desc">Better than last week (76.3%)</div>
			</div>
		</div>
		<!-- end col-3 -->
		<!-- begin col-3 -->
		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-black">
				<div class="stats-icon stats-icon-lg"><i class="fa fa-comments fa-fw"></i></div>
				<div class="stats-title">NEW COMMENTS</div>
				<div class="stats-number">3,988</div>
				<div class="stats-progress progress">
					<div class="progress-bar" style="width: 54.9%;"></div>
				</div>
				<div class="stats-desc">Better than last week (54.9%)</div>
			</div>
		</div>
		<!-- end col-3 -->
	</div>
	<!-- end row -->
	
	<!-- begin row -->
	<div class="row">
		<div class="col-md-8">
			<div class="widget-chart with-sidebar bg-black">
				<div class="widget-chart-content">
					<h4 class="chart-title">
						Visitors Analytics
						<small>Where do our visitors come from</small>
					</h4>
					<div id="visitors-line-chart" class="morris-inverse" style="height: 260px;"></div>
				</div>
				<div class="widget-chart-sidebar bg-black-darker">
					<div class="chart-number">
						1,225,729
						<small>visitors</small>
					</div>
					<div id="visitors-donut-chart" style="height: 160px"></div>
					<ul class="chart-legend">
						<li><i class="fa fa-circle-o fa-fw text-success m-r-5"></i> 34.0% <span>New Visitors</span></li>
						<li><i class="fa fa-circle-o fa-fw text-primary m-r-5"></i> 56.0% <span>Return Visitors</span></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-inverse" data-sortable-id="index-1">
				<div class="panel-heading">
					<h4 class="panel-title">
						Visitors Origin
					</h4>
				</div>
				<div id="visitors-map" class="bg-black" style="height: 181px;"></div>
				<div class="list-group">
					<a href="#" class="list-group-item list-group-item-inverse text-ellipsis">
						<span class="badge badge-success">20.95%</span>
						1. United State 
					</a> 
					<a href="#" class="list-group-item list-group-item-inverse text-ellipsis">
						<span class="badge badge-primary">16.12%</span>
						2. India
					</a>
					<a href="#" class="list-group-item list-group-item-inverse text-ellipsis">
						<span class="badge badge-inverse">14.99%</span>
						3. South Korea
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end row -->
	<!-- begin row -->
	<div class="row">
		<!-- begin col-4 -->
		<div class="col-md-4">
			<!-- begin panel -->
			<div class="panel panel-inverse" data-sortable-id="index-2">
				<div class="panel-heading">
					<h4 class="panel-title">Chat History <span class="label label-success pull-right">4 message</span></h4>
				</div>
				<div class="panel-body bg-silver">
					<div data-scrollbar="true" data-height="225px">
						<ul class="chats">
							<li class="left">
								<span class="date-time">yesterday 11:23pm</span>
								<a href="javascript:;" class="name">Sowse Bawdy</a>
								<a href="javascript:;" class="image"><img alt="" src="/assets/img/user-12.jpg" /></a>
								<div class="message">
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit volutpat. Praesent mattis interdum arcu eu feugiat.
								</div>
							</li>
							<li class="right">
								<span class="date-time">08:12am</span>
								<a href="#" class="name"><span class="label label-primary">ADMIN</span> Me</a>
								<a href="javascript:;" class="image"><img alt="" src="/assets/img/user-13.jpg" /></a>
								<div class="message">
									Nullam posuere, nisl a varius rhoncus, risus tellus hendrerit neque.
								</div>
							</li>
							<li class="left">
								<span class="date-time">09:20am</span>
								<a href="#" class="name">Neck Jolly</a>
								<a href="javascript:;" class="image"><img alt="" src="/assets/img/user-10.jpg" /></a>
								<div class="message">
									Euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
								</div>
							</li>
							<li class="left">
								<span class="date-time">11:15am</span>
								<a href="#" class="name">Shag Strap</a>
								<a href="javascript:;" class="image"><img alt="" src="/assets/img/user-14.jpg" /></a>
								<div class="message">
									Nullam iaculis pharetra pharetra. Proin sodales tristique sapien mattis placerat.
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="panel-footer">
					<form name="send_message_form" data-id="message-form">
						<div class="input-group">
							<input type="text" class="form-control input-sm" name="message" placeholder="Enter your message here.">
							<span class="input-group-btn">
								<button class="btn btn-primary btn-sm" type="button">Send</button>
							</span>
						</div>
					</form>
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-4 -->
		<!-- begin col-4 -->
		<div class="col-md-4">
			<!-- begin panel -->
			<div class="panel panel-inverse" data-sortable-id="index-3">
				<div class="panel-heading">
					<h4 class="panel-title">Today's Schedule</h4>
				</div>
				<div id="schedule-calendar" class="bootstrap-calendar"></div>
				<div class="list-group">
					<a href="#" class="list-group-item text-ellipsis">
						<span class="badge badge-success">9:00 am</span> Sales Reporting
					</a> 
					<a href="#" class="list-group-item text-ellipsis">
						<span class="badge badge-primary">2:45 pm</span> Have a meeting with sales team
					</a>
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-4 -->
		<!-- begin col-4 -->
		<div class="col-md-4">
			<!-- begin panel -->
			<div class="panel panel-inverse" data-sortable-id="index-4">
				<div class="panel-heading">
					<h4 class="panel-title">New Registered Users <span class="pull-right label label-success">24 new users</span></h4>
				</div>
				<ul class="registered-users-list clearfix">
					<li>
						<a href="javascript:;"><img src="/assets/img/user-5.jpg" alt="" /></a>
						<h4 class="username text-ellipsis">
							Savory Posh
							<small>Algerian</small>
						</h4>
					</li>
					<li>
						<a href="javascript:;"><img src="/assets/img/user-3.jpg" alt="" /></a>
						<h4 class="username text-ellipsis">
							Ancient Caviar
							<small>Korean</small>
						</h4>
					</li>
					<li>
						<a href="javascript:;"><img src="/assets/img/user-1.jpg" alt="" /></a>
						<h4 class="username text-ellipsis">
							Marble Lungs
							<small>Indian</small>
						</h4>
					</li>
					<li>
						<a href="javascript:;"><img src="/assets/img/user-8.jpg" alt="" /></a>
						<h4 class="username text-ellipsis">
							Blank Bloke
							<small>Japanese</small>
						</h4>
					</li>
					<li>
						<a href="javascript:;"><img src="/assets/img/user-2.jpg" alt="" /></a>
						<h4 class="username text-ellipsis">
							Hip Sculling
							<small>Cuban</small>
						</h4>
					</li>
					<li>
						<a href="javascript:;"><img src="/assets/img/user-6.jpg" alt="" /></a>
						<h4 class="username text-ellipsis">
							Flat Moon
							<small>Nepalese</small>
						</h4>
					</li>
					<li>
						<a href="javascript:;"><img src="/assets/img/user-4.jpg" alt="" /></a>
						<h4 class="username text-ellipsis">
							Packed Puffs
							<small>Malaysian></small>
						</h4>
					</li>
					<li>
						<a href="javascript:;"><img src="/assets/img/user-9.jpg" alt="" /></a>
						<h4 class="username text-ellipsis">
							Clay Hike
							<small>Swedish</small>
						</h4>
					</li>
				</ul>
				<div class="panel-footer text-center">
					<a href="javascript:;" class="text-inverse">View All</a>
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-4 -->
	</div>
	<!-- end row -->
</div>
@endsection
@section('my-js')
<script>
	$(document).ready(function() {
		App.init();
		DashboardV2.init();
	});
</script>
@endsection		
