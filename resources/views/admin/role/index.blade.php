@extends('layouts.admin') @section('content')
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">权限管理</a></li>
        <!--<li><a href="javascript:;">权限列表</a></li>-->
        <li class="active">角色列表</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">权限管理<small>...</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row" id="role">
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
                    <h4 class="panel-title">角色列表</h4>
                </div>
                <div class="panel-body">
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
                                    <a href="{{url('admin/role/create')}}"  class="btn btn-primary m-r-5 m-b-5" style="height: 32px;margin-top: 4px;">角色添加</a>
                                    @endpermission
                                </label>
                            </div>
                            <div id="data-table_filter" class="dataTables_filter">
                                <label>查询:
                                <input type="search" class="" placeholder="只能查角色名" aria-controls="data-table" v-model="name" v-on:change="changeName(name)">
                                </label>
                            </div>
                            <table id="data-table" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="data-table_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                            style="width: 271px;">编号</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table"
                                            rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 392px;">角色</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 237px;">权限管理</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                            colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 182px;">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="vo in items">
                                        <tr class="gradeA odd" role="row" >
                                            <td class="sorting_1">@{{vo.id}}</td>
                                            <td>@{{vo.display_name}}</td>
                                            <td>
                                                <a type="button" class="btn btn-success" @click="permission(vo.id)" href="#modal-dialog" data-toggle="modal">
                                                    <i class="fa fa-group"></i>
                                                    <span>权限分配</span>
                                                </a>
                                            </td>
                                            <td>
                                                @permission('admin.permission.edit')
                                                <a href="{{url('admin/role')}}/@{{vo.id}}/edit" class="btn btn-primary delete">
                                                <i class="fa fa-edit"></i>
                                                <span>修改</span>
                                                </a>
                                                 @endpermission
                                                 @permission('admin.permission.edit')
                                                <button type="button" class="btn btn-danger delete" @click="destroy(vo.id)">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                    <span>删除</span>
                                                </button>
                                                @endpermission
                                            </td>
                                        </tr>
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
            <!-- #modal-dialog -->
            <div class="modal fade" id="modal-dialog">
                <div class="modal-dialog" style="width: 70%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">权限分配</h4>
                            <input type="hidden" v-model="role.id">
                        </div>
                        <div class="modal-body">
                        <div class="container" style="width: 100%">
                            <table cellspacing="1" id="rs" class="table table-bordered table-hover" style="width: 100%">
                            <tr class="r1" v-for="vo in rule">
                                <td>
                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="inverted" name="rules" value="@{{vo.id}}" id="rules_@{{vo.id}}">
                                                <span class="text">@{{vo.display_name}}</span>
                                            </label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div v-for="v in vo.child">
                                        <div class="col-lg-12 col-sm-12 col-xs-12 r2" style="background:#ccc;">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="inverted" name="rules" value="@{{v.id}}" id="rules_@{{v.id}}">
                                                    <span class="text">@{{v.display_name}}</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-2 col-xs-2 r3" v-for="t in v.child">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="inverted" name="rules" value="@{{t.id}}" id="rules_@{{t.id}}">
                                                    <span class="text">@{{t.display_name}}</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">取消</a>
                            <a href="javascript:;" class="btn btn-sm btn-success" @click="addRule()">保存</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
@endsection @section('my-js')
<script src="/layer/layer.js"></script>
<script src="/assets/js/ui-modal-notification.demo.min.js"></script>
<script>
	$(document).ready(function() {
		App.init();
        Notification.init();
	});
    $(function() {
        $('.r1 td:nth-child(1) .inverted').on('click', function() {
            if ($(this).prop('checked')) {
                $(this).closest('td').siblings().find('.inverted').prop('checked', true);
            } else {
                $(this).closest('td').siblings().find('.inverted').prop('checked', false);
            }
        });
        $('.r1 td:nth-child(2) .r2 .inverted').on('click', function() {
            if($(this).prop('checked')){
                $(this).closest('.r2').siblings('.r3').find('.inverted').prop('checked', true);
            }else{
                $(this).closest('.r2').siblings('.r3').find('.inverted').prop('checked', false);
            }
        });
    })
var vn = new Vue({
        el: '#role',
        http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        },
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
            name:'',
            rule:[],
            role:{}
        },
        created: function () {
            this.fetchItems(this.pagination.current_page,this.pageSize,'');
            this.$set('rule',{!! $rule !!});
        },
        computed: {
            /**
             *  [isActived 判断选中]
             */
            isActived: function () {
                return this.pagination.current_page;
            },
            /**
             *  [pagesNumber 页数]
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
             */
            fetchItems: function (page,pageSize,name) {
                var data = {page: page,pageSize:pageSize,display_name:name};
                this.$http.post("{{url('admin/role/index')}}", data).then(function (response) {
                    this.$set('items', response.data.result.data);
                    this.$set('pagination', response.data.result.pagination);
                }, function (error) {
                    console.log("系统错误");
                });
            },
            /**
             *  [changePage 监听页数]
             */
            changePage: function (page,pageSize,name) {
                this.pagination.current_page = page;
                this.fetchItems(page,pageSize,name);
            },
            /**
             *  [changePageSize 监听条数]
             */
            changePageSize: function (pageSize,name){
                this.pagination.current_page = 1;
                this.pageSize = pageSize;
                this.name = '';
                this.fetchItems(this.pagination.current_page,pageSize,'');
            },
            /**
             *  [changeName 监听name]
             */
            changeName: function (name){
                this.pagination.current_page = 1;
                this.name = name;
                this.fetchItems(this.pagination.current_page,this.pageSize,name);
            },
            /**
             *  [destroy 删除权限]
             */
            destroy:function (id){
                layer.confirm('确认删除角色', {icon: 1, title:'提示'}, function(index){
                    vn.$http.delete("{{url('admin/role')}}/"+id).then(function(response){
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
            },
            /**
             *  [permission 权限显示]
             */
            permission: function (id){
                $("input[type='checkbox']").prop('checked',false);
                this.role.id = id;
                this.$http.get("{{url('admin/role')}}/"+id).then(function (response) {
                    if(response.data.result.length > 0){
                        var grant = response.data.result;
                        for (var i = 0; i < grant.length; i++) {
                            $('#rules_'+grant[i].id).prop('checked',true);
                        }
                    }
                }, function (error) {
                    console.log("系统错误");
                });
            },
            /**
             *  [addRule 权限分配]
             */
            addRule: function (){
                let grant = [];
                $('.inverted').each(function(){
                   if($(this).prop('checked'))grant.push($(this).val());
                });
                this.role.rules = grant;
                this.$http.post("{{url('admin/role/rule')}}",this.role).then(function (response) {
                    if(response.data.code == 200){
                        var ii = layer.load();
                        //此处用setTimeout演示ajax的回调
                        setTimeout(function(){
                            layer.close(ii);
                            $('#modal-dialog').modal('hide');
                        }, 3000);
                    }
                }, function (error) {
                    console.log("系统错误");
                });
            }
        }
    });
</script> @endsection