@extends('layouts.admin') @section('content')
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">权限管理</a></li>
        <!--<li><a href="javascript:;">权限列表</a></li>-->
        <li class="active">权限列表</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">权限管理<small>...</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12 ui-sortable">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">权限列表</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <div id="data-table_wrapper" class="dataTables_wrapper no-footer">
                            <div class="dataTables_length" id="data-table_length">
                                <label>显示
                                            <select name="data-table_length" aria-controls="data-table" class="">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> 
                                            <a href="{{url('admin/permission/create')}}"  class="btn btn-primary m-r-5 m-b-5" style="height: 32px;margin-top: 4px;">权限添加</a>
                                        </label>
                            </div>
                            <div id="data-table_filter" class="dataTables_filter">
                                <label>查询:<input type="search" class="" placeholder="" aria-controls="data-table">
                                            </label>
                            </div>
                            <table id="data-table" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="data-table_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                            style="width: 271px;">Rendering engine</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table"
                                            rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 392px;">Browser</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 360px;">Platform(s)</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 237px;">Engine version</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                            colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 182px;">CSS grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gradeA odd" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Firefox 1.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.7</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="gradeA even" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Firefox 1.5</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Firefox 2.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="gradeA even" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Firefox 3.0</td>
                                        <td>Win 2k+ / OSX.3+</td>
                                        <td>1.9</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Camino 1.0</td>
                                        <td>OSX.2+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="gradeA even" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Camino 1.5</td>
                                        <td>OSX.3+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Netscape 7.2</td>
                                        <td>Win 95+ / Mac OS 8.6-9.2</td>
                                        <td>1.7</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="gradeA even" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Netscape Browser 8</td>
                                        <td>Win 98SE+</td>
                                        <td>1.7</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Netscape Navigator 9</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="gradeA even" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Mozilla 1.0</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td>1</td>
                                        <td>A</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="dataTables_info" id="data-table_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                            <div class="dataTables_paginate paging_simple_numbers" id="data-table_paginate"><a class="paginate_button previous disabled" aria-controls="data-table" data-dt-idx="0" tabindex="0"
                                    id="data-table_previous">Previous</a><span><a class="paginate_button current" aria-controls="data-table" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="data-table" data-dt-idx="2" tabindex="0">2</a><a class="paginate_button " aria-controls="data-table" data-dt-idx="3" tabindex="0">3</a><a class="paginate_button " aria-controls="data-table" data-dt-idx="4" tabindex="0">4</a><a class="paginate_button " aria-controls="data-table" data-dt-idx="5" tabindex="0">5</a><a class="paginate_button " aria-controls="data-table" data-dt-idx="6" tabindex="0">6</a></span>
                                <a
                                    class="paginate_button next" aria-controls="data-table" data-dt-idx="7" tabindex="0" id="data-table_next">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
@endsection @section('my-js')
<script>
	$(document).ready(function() {
		App.init();
	});
</script> @endsection