@extends('layouts.admin') @section('style')
<style>
    .input {
        width: 500px;
    }
    .bootstrap-select.form-control:not([class*="span"]) {
        width: 500px;
    }
</style>
@endsection @section('content')
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">权限管理</a></li>
        <li><a href="javascript:;">权限列表</a></li>
        <li class="active">权限添加</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">权限管理<small>...</small></h1>
    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-5">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">权限添加</h4>
                </div>
                <div class="panel-body" id="node">
                    <validator name="nodeValidation">
                        <form class="form-horizontal" novalidate method="POST">
                            <fieldset>
                                <legend></legend>
                                <div class="form-group">
                                    <label class="col-md-3 control-label ">上级权限:</label>
                                    <div class="col-md-9">
                                        <select class="form-control selectpicker input" id="parent_id" data-size="10" v-model="p.parent_id" data-live-search="true" data-style="btn-white">
                                        <option value="0">顶级权限</option>
                                        @foreach($list as $vo)
                                        @if($vo['id']==$rule['parent_id'])
                                        <option value="{{$vo['id']}}" selected>{{$vo['display_name']}}</option>
                                        @else
                                        <option value="{{$vo['id']}}">{{$vo['display_name']}}</option>
                                        @endif
                                        @foreach($vo['child'] as $v)
                                        @if($v['id']==$rule['parent_id'])
                                        <option value="{{$v['id']}}" selected>┗━{{$v['display_name']}}</option>
                                        @else
                                        <option value="{{$v['id']}}">┗━{{$v['display_name']}}</option>
                                        @endif
                                        @endforeach
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">权限别名:</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="p.name" name="name" v-validate:name="{ required: true}" class="form-control input" placeholder="权限别名,如(admin.permission.index)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">权限名:</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="p.display_name" name="displayName" v-validate:displayName="{ required: true}" class="form-control input" placeholder="权限名">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="message">简要描述:</label>
                                    <div class="col-md-9">
                                        <textarea v-model="p.description" name="description" class="form-control input" v-validate:description="{ required: true}" id="message" name="message" rows="4" data-parsley-range="[20,200]"
                                            placeholder="这里填写当前权限的简要描述"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">权限排序:</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="p.sort" name="sort" class="form-control input" placeholder="排序号" v-validate:sort="{ required: true}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">权限图标:</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="p.icon" name="icon" class="form-control input" placeholder="权限图标">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">是否是菜单:</label>
                                    <div class="col-md-9">
                                        <input type="checkbox" v-model="p.is_menu"  data-render="switchery" data-theme="default"  />
                                    </div>
                                </div>
                                @permission('admin.permission.store')
                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button @click="addNode()" :disabled="$nodeValidation.invalid" type="button" class="btn btn-success btn-lg m-r-5" style="width: 100px">保 存</button>
                                    </div>
                                </div>
                                @endpermission
                                <div class="form-group" v-if="msg">
                                    <div class="col-md-9 col-md-offset-3">
                                        <div class="alert alert-danger fade in m-b-15">
                                            <strong>Error!</strong>
                                            <span v-text="msg">.</span>
                                            <span class="close" data-dismiss="alert">×</span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </validator>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-6 -->
    </div>
    <!-- end row -->
</div>
@endsection @section('my-js')
    <!-- ================== Vue JS ================== -->
    <script src="/layer/layer.js"></script>
    <!-- ================== END vue JS ================== -->
    <script>
    	$(document).ready(function() {
    		App.init();
            FormPlugins.init();
            FormSliderSwitcher.init();
    	});
        new Vue({
            http: {
                root: '/root',
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
            },
            el: '#node',
            data: {
                p:{},
                msg:''
            },
            created: function (){
                this.$set('p',{!! $rules !!})
            },
            methods: {
                addNode: function() {
                    this.p.parent_id = $("#parent_id").val();
                    this.p.is_menu = this.p.is_menu?1:0;
                    if(this.p.id != undefined && this.p.id > 0){
                        this.updateNode(this.p);
                    }else{
                        this.createNode(this.p);
                    }
                },
                createNode: function (data){
                    this.$http.post("{{url('/admin/permission/store')}}",data).then(function (response){
                        if(response.data.code == 400){
                            this.msg = response.data.message
                        }
                        if(response.data.code == 422){
                            this.msg = response.data.message
                        }
                        if(response.data.code == 200){
                            var ii = layer.load();
                            //此处用setTimeout演示ajax的回调
                            setTimeout(function(){
                                layer.close(ii);
                                window.location.href = "{{url('/admin/permission/index')}}";
                            }, 3000);
                        }
                    }, function (response) {
                        console.log(response)
                    });
                },
                updateNode: function (data){
                    this.$http.put("{{url('/admin/permission/')}}/"+data.id,data).then(function (response){
                        if(response.data.code == 400){
                            this.msg = response.data.message
                        }
                        if(response.data.code == 422){
                            this.msg = response.data.message
                        }
                        if(response.data.code == 200){
                            var ii = layer.load();
                            //此处用setTimeout演示ajax的回调
                            setTimeout(function(){
                                layer.close(ii);
                                window.location.href = "{{url('/admin/permission/index')}}";
                            }, 3000);
                        }
                    }, function (response) {
                        console.log(response)
                    });
                }
            }
        });
    </script>
@endsection