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
        <li><a href="javascript:;">管理员列表</a></li>
        <li class="active">管理员添加</li>
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
                    <h4 class="panel-title">管理员添加</h4>
                </div>
                <div class="panel-body" id="user">
                    <validator name="userValidation">
                        <form class="form-horizontal" novalidate method="POST">
                            <fieldset>
                                <legend></legend>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">管理员名称:</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="u.name" name="name" v-validate:name="{ required: true}" readonly="@{{readonly}}" class="form-control input" placeholder="管理员名称,如(admin)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">管理员邮箱:</label>
                                    <div class="col-md-9">
                                        <input type="email" v-model="u.email" name="email" v-validate:email="{ required: true}" class="form-control input" placeholder="管理员邮箱" readonly="@{{readonly}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">密码:</label>
                                    <div class="col-md-9">
                                        <input type="password" v-model="u.password" name="password" v-validate:password="{required:true,minlength:6,maxlength:12}" class="form-control input" placeholder="密码">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">确认密码:</label>
                                    <div class="col-md-9">
                                        <input type="password" v-model="u.password_confirmation" name="passwordConfirmation" v-validate:passwordConfirmation="{minlength:6,maxlength:12}" class="form-control input" placeholder="确认密码">
                                    </div>
                                </div>
                                @permission('admin.user.store')
                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button @click="addUser()" :disabled="$userValidation.invalid" type="button" class="btn btn-success btn-lg m-r-5" style="width: 100px">保 存</button>
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
            el: '#user',
            http: {
                root: '/root',
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
            },
            data: {
                u:{},
                msg:'',
                readonly:false
            },
            created: function (){
                this.$set('u',{!! $user !!});
                if(this.u.id > 0){
                    this.readonly = true;
                }
            },
            methods: {
                addUser: function() {
                    if(this.u.id != undefined && this.u.id > 0){
                        this.updateUser(this.u);
                    }else{
                        this.createUser(this.u);
                    }
                },
                createUser: function (data){
                    this.$http.post("{{url('/admin/user/store')}}",data).then(function (response){
                        console.log(response.data)
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
                                window.location.href = "{{url('/admin/user/index')}}";
                            }, 3000);
                        }
                    }, function (response) {
                        console.log(response)
                    });
                },
                updateUser: function (data){
                    this.$http.put("{{url('/admin/user')}}/"+data.id,data).then(function (response){
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
                                window.location.href = "{{url('/admin/user/index')}}";
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