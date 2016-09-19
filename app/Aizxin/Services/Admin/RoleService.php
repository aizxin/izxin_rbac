<?php
namespace Aizxin\Services\Admin;

use Aizxin\Services\CommonService;
use Aizxin\Repositories\Eloquent\Admin\RoleRepository;
use Aizxin\Repositories\Eloquent\Admin\PermissionRepository;
use Aizxin\Validators\RoleValidator;

use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;

class RoleService extends CommonService
{
    /**
     * @var RoleRepository
     */
    protected $repository;
    /**
     * @var RoleValidator
     */
    protected $validator;
    /**
     *  @var PermissionRepository
     */
    protected $permission;
    /**
     *  [__construct description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T10:33:33+0800
     *  @param    RoleRepository           $repository [description]
     *  @param    RoleValidator            $validator  [description]
     */
    public function __construct(RoleRepository $repository, RoleValidator $validator, PermissionRepository $permission)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->permission = $permission;
    }
    /**
     *  [getRoleList 角色列表]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T12:09:44+0800
     *  @param    [type]                   $request [description]
     *  @return   [type]                            [description]
     */
    public function getRoleList($request)
    {
        return $this->respondWithSuccess($this->repository->getRoleList($request), '返回成功');
    }
    /**
     *  [create 角色添加和修改]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T12:12:42+0800
     *  @param    [type]                   $request [description]
     *  @return   [type]                            [description]
     */
    public function create($request)
    {
        $data = $request->all();
        // return $this->respondWithSuccess($data, '修改成功');
        try {
            $this->validator->with( $data )->passesOrFail();
            if(isset($data['id']) && $data['id'] > 0){
                if( $this->repository->update( $data ,$data['id'])){
                    return $this->respondWithSuccess(1, '修改成功');
                }
                return $this->respondWithErrors('修改失败',400);
            }else{
                if( $this->repository->create( $data )){
                    return $this->respondWithSuccess(1, '添加成功');
                }
                return $this->respondWithErrors('添加失败',400);
            }
        } catch (ValidatorException $e) {
            return $this->respondWithErrors( $e->getMessageBag()->first() , 422);
        }
    }
    /**
     *  [findById 根据id查角色]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T13:48:43+0800
     *  @param    string                   $id [description]
     *  @return   [type]                       [description]
     */
    public function findById($id='')
    {
        return $this->repository->find($id)->toJson();
    }
    /**
     *  [permissionList 权限列表]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T15:39:19+0800
     *  @return   [type]                   [description]
     */
    public function permissionList()
    {
        return json_encode($this->permission->permissionList());
    }
    /**
     *  [getPermissionRole description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T18:08:11+0800
     *  @param    [type]                   $id [description]
     *  @return   [type]                       [description]
     */
    public function getPermissionRole($id)
    {
        // return $this->repository->getPermissionRole($id);
        return $this->respondWithSuccess($this->repository->getPermissionRole($id), '添加成功');
    }
}