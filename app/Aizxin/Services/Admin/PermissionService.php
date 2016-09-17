<?php
namespace Aizxin\Services\Admin;

use Aizxin\Services\CommonService;
use Aizxin\Repositories\Eloquent\Admin\PermissionRepository;
use Aizxin\Validators\PermissionValidator;

use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;

class PermissionService extends CommonService
{
    /**
     * @var PermissionRepository
     */
    protected $repository;
    /**
     * @var PermissionValidator
     */
    protected $validator;
    public function __construct(PermissionRepository $repository, PermissionValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
    /**
     *  [create 权限节点添加]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-14T23:57:49+0800
     *  @param    [type]                   $request [description]
     *  @return   [type]                            [description]
     */
    public function create($request)
    {
        $data = $request->all();
        try {
            if(isset($data['id']) && $data['id'] > 0){
                $this->validator->with( $data )->passesOrFail( ValidatorInterface::RULE_UPDATE );
                if( $this->repository->update( $data )){
                    return $this->respondWithSuccess(1, '添加成功');
                }
            }else{
                $this->validator->with( $data )->passesOrFail( ValidatorInterface::RULE_CREATE );
                if( $this->repository->create( $data )){
                    return $this->respondWithSuccess(1, '添加成功');
                }
            }
            return $this->respondWithErrors('添加失败',400);

        } catch (ValidatorException $e) {
            return $this->respondWithErrors( $e->getMessageBag()->first() , 422);
        }
    }
    /**
     *  [getPermissionParent 顶级权限]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-16T13:27:52+0800
     *  @return   [type]                   [description]
     */
    public function getPermissionParent()
    {
        return $this->repository->getPermissionParent();
    }
    /**
     *  [getPermissionList 权限列表]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-17T12:59:54+0800
     *  @return   [type]                   [description]
     */
    public function getPermissionList($request)
    {
        return $this->respondWithSuccess($this->repository->getPermissionList($request), '返回成功');
    }
    /**
     *  [destroy 删除权限]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-17T17:18:37+0800
     *  @param    [type]                   $request [description]
     *  @return   [type]                            [description]
     */
    public function destroy($id)
    {
        if($this->repository->destroyPermission($id) !== false){
            return $this->respondWithSuccess(1, '删除成功');
        }
        return $this->respondWithErrors('有子权限,不能删除',400);
    }
    /**
     *  [find 获取权限]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-17T18:50:00+0800
     *  @param    [type]                   $id [description]
     *  @return   [type]                       [description]
     */
    public function find($id)
    {
        return $this->repository->editMenu($id);
    }
}