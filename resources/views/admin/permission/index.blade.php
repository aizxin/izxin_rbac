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
                <div class="panel-body" id="permission">
                    <div class="table-responsive">
                        <div id="data-table_wrapper" class="dataTables_wrapper no-footer">
                            <div class="dataTables_length" id="data-table_length">
                                <label>显示
                                    <select name="data-table_length" aria-controls="data-table" class="" v-on:change="changePageSize(pageSize,name)" v-model="pageSize">
                                        <option value="10" selected>10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    @permission('admin.permission.create')
                                    <a href="{{url('admin/permission/create')}}"  class="btn btn-primary m-r-5 m-b-5" style="height: 32px;margin-top: 4px;">权限添加</a>
                                    @endpermission
                                </label>
                            </div>
                            <div id="data-table_filter" class="dataTables_filter">
                                <label>查询:
                                <input type="search" class="" placeholder="只能查顶级权限" aria-controls="data-table" v-model="name" v-on:change="changeName(name)">
                                </label>
                            </div>
                            <table id="data-table" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="data-table_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                            style="width: 271px;">编号</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table"
                                            rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 392px;">名称</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 360px;">排序</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 237px;">操作</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                            colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 182px;">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="vo in items">
                                        <tr class="gradeA odd" role="row" >
                                            <td class="sorting_1">@{{vo.id}}</td>
                                            <td>@{{vo.display_name}}</td>
                                            <td>@{{vo.sort}}</td>
                                            <td>
                                                @permission('admin.permission.edit')
                                                <a href="{{url('admin/permission')}}/@{{vo.id}}/edit" class="btn btn-primary delete">
                                                <i class="fa fa-edit"></i>
                                                <span>修改</span>
                                                </a>
                                                 @endpermission
                                            </td>
                                            <td>
                                                 @permission('admin.permission.destroy')
                                                <button type="button" class="btn btn-danger delete" @click="destroy(vo.id)">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                    <span>删除</span>
                                                </button>
                                                @endpermission
                                            </td>
                                        </tr>
                                            <template v-for="v in vo.child">
                                                <tr class="gradeA even" role="row" >
                                                    <td class="sorting_1">@{{v.id}}</td>
                                                    <td>┗━@{{v.display_name}}</td>
                                                    <td>@{{v.sort}}</td>
                                                    <td>
                                                        @permission('admin.permission.edit')
                                                        <a href="{{url('admin/permission')}}/@{{v.id}}/edit" class="btn btn-primary delete">
                                                            <i class="fa fa-edit"></i>
                                                            <span>修改</span>
                                                        </a>
                                                        @endpermission
                                                    </td>
                                                    <td>
                                                        @permission('admin.permission.destroy')
                                                        <button type="button" class="btn btn-danger delete" @click="destroy(v.id)">
                                                            <i class="glyphicon glyphicon-trash"></i>
                                                            <span>删除</span>
                                                        </button>
                                                        @endpermission
                                                    </td>
                                                </tr>
                                                <template v-for="t in v.child">
                                                    <tr class="gradeA even" role="row" >
                                                        <td class="sorting_1">@{{t.id}}</td>
                                                        <td>┗━━@{{t.display_name}}</td>
                                                        <td>@{{t.sort}}</td>
                                                        <td>
                                                            @permission('admin.permission.edit')
                                                            <button type="button" class="btn btn-primary delete">
                                                                <i class="fa fa-edit"></i>
                                                                <span>修改</span>
                                                            </button>
                                                            @endpermission
                                                        </td>
                                                        <td>
                                                            @permission('admin.permission.destroy')
                                                            <button type="button" class="btn btn-danger delete" @click="destroy(t.id)">
                                                                <i class="glyphicon glyphicon-trash"></i>
                                                                <span>删除</span>
                                                            </button>
                                                            @endpermission
                                                    </td>
                                                    </tr>
                                                </template>
                                            </template>
                                    </template>
                                </tbody>
                            </table>
                            <div class="dataTables_info" id="data-table_info" role="status" aria-live="polite">显示 第@{{pagination.current_page}}页，一页显示@{{pageSize}}条，总数@{{pagination.total}}条</div>
                            <div class="dataTables_paginate paging_simple_numbers" id="data-table_paginate">
                                    <a class="paginate_button previous" aria-controls="data-table" data-dt-idx="0" v-bind:class="[ 1 == isActived ? 'disabled' : '']" tabindex="0" id="data-table_previous" @click.prevent="changePage(pagination.current_page - 1,pageSize,name)">上一页</a>
                                    <span v-for="page in pagesNumber">
                                        <a class="paginate_button" v-bind:class="[ page == isActived ? 'current' : '']" aria-controls="data-table" data-dt-idx="1" tabindex="0" @click.prevent="changePage(page,pageSize,name)">@{{page}}</a>
                                    </span>
                                    <a class="paginate_button next" aria-controls="data-table" data-dt-idx="7" v-bind:class="[ pagination.current_page == pagination.last_page ? 'disabled' : '']" tabindex="0" id="data-table_next" @click.prevent="changePage(pagination.current_page + 1,pageSize,name)">下一页</a>
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
<script src="/layer/layer.js"></script>
<script>
	$(document).ready(function() {
		App.init();
	});
var vn = new Vue({
        http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        },
        el: '#permission',
        data: {
            pagination: {
                total: 0,
                per_page: 7,
                from: 1,
                to: 0,
                current_page: 1
            },
            offset: 4,// left and right padding from the pagination <span>,just change it to see effects
            items: [],
            msg:'',
            pageSize:10,
            name:''
        },
        created: function () {
            this.fetchItems(this.pagination.current_page,this.pageSize,'');
        },
        computed: {
            /**
             *  [isActived 判断选中]
             *  izxin.com
             *  @author qingfeng
             *  @DateTime 2016-09-17T17:22:06+0800
             *  @return   {Boolean}                [description]
             */
            isActived: function () {
                return this.pagination.current_page;
            },
            /**
             *  [pagesNumber 页数]
             *  izxin.com
             *  @author qingfeng
             *  @DateTime 2016-09-17T17:22:38+0800
             *  @return   {[type]}                 [description]
             */
            pagesNumber: function () {
                if (!this.pagination.to) {
                    return [];
                }
                var from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                var to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                var pagesArray = [];
                while (from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            }
        },
        methods: {
            /**
             *  [fetchItems 获取权限]
             *  izxin.com
             *  @author qingfeng
             *  @DateTime 2016-09-17T17:22:51+0800
             *  @param    {[type]}                 page     [description]
             *  @param    {[type]}                 pageSize [description]
             *  @param    {[type]}                 name     [description]
             *  @return   {[type]}                          [description]
             */
            fetchItems: function (page,pageSize,name) {
                var data = {page: page,pageSize:pageSize,display_name:name};
                this.$http.post("{{url('admin/permission/index')}}", data).then(function (response) {
                    this.$set('items', response.data.result.data);
                    this.$set('pagination', response.data.result.pagination);
                }, function (error) {
                    // handle error
                });
            },
            /**
             *  [changePage 监听页数]
             *  izxin.com
             *  @author qingfeng
             *  @DateTime 2016-09-17T17:23:10+0800
             *  @param    {[type]}                 page     [description]
             *  @param    {[type]}                 pageSize [description]
             *  @param    {[type]}                 name     [description]
             *  @return   {[type]}                          [description]
             */
            changePage: function (page,pageSize,name) {
                this.pagination.current_page = page;
                this.fetchItems(page,pageSize,name);
            },
            /**
             *  [changePageSize 监听条数]
             *  izxin.com
             *  @author qingfeng
             *  @DateTime 2016-09-17T17:23:53+0800
             *  @param    {[type]}                 pageSize [description]
             *  @param    {[type]}                 name     [description]
             *  @return   {[type]}                          [description]
             */
            changePageSize: function (pageSize,name){
                this.pagination.current_page = 1;
                this.pageSize = pageSize;
                this.name = '';
                this.fetchItems(this.pagination.current_page,pageSize,'');
            },
            /**
             *  [changeName 监听name]
             *  izxin.com
             *  @author qingfeng
             *  @DateTime 2016-09-17T17:24:22+0800
             *  @param    {[type]}                 name [description]
             *  @return   {[type]}                      [description]
             */
            changeName: function (name){
                this.pagination.current_page = 1;
                this.name = name;
                this.fetchItems(this.pagination.current_page,this.pageSize,name);
            },
            /**
             *  [destroy 删除权限]
             *  izxin.com
             *  @author qingfeng
             *  @DateTime 2016-09-17T17:24:59+0800
             *  @param    {[type]}                 id [description]
             *  @return   {[type]}                    [description]
             */
            destroy:function (id){
                layer.confirm('确认删除权限', {icon: 1, title:'提示'}, function(index){
                    vn.$http.delete("{{url('admin/permission')}}/"+id).then(function(response){
                        if(response.data.code == 400){
                            layer.close(index);
                            layer.msg(response.data.message);
                        }
                        if (response.data.code == 200) {
                            layer.msg(response.data.message, {
                                icon: 1,
                                time: 2000 //2秒关闭（如果不配置，默认是3秒）
                            }, function(){
                                vn.name = '';
                                vn.fetchItems(vn.pagination.current_page,vn.pageSize,'');
                            });
                        }
                    }, function (error) {
                       layer.close(index);
                       layer.msg('系统错误');
                    });
                });
            }
        }
    });
</script> @endsection