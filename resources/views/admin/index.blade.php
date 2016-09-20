@extends('layouts.admin')
@section('content')
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">主页管理</a></li>
		<!-- <li><a href="javascript:;">Dashboard</a></li> -->
		<li class="active">后台主页</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">后台主页<small>...</small></h1>
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
