<?php
namespace Aizxin\Services\Admin;

use Aizxin\Services\CommonService;
use Aizxin\Repositories\Eloquent\Admin\UserRepository;
use Aizxin\Repositories\Eloquent\Admin\RoleRepository;
use Aizxin\Validators\UserValidator;

use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;

class UserService extends CommonService
{
    /**
     * @var UserRepository
     */
    protected $repository;
    /**
     * @var UserValidator
     */
    protected $validator;
    /**
     *  @var RoleRepository
     */
    protected $role;
    /**
     *  [__construct description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T10:33:33+0800
     *  @param    UserRepository           $repository [description]
     *  @param    UserValidator            $validator  [description]
     */
    public function __construct(UserRepository $repository, UserValidator $validator,RoleRepository $role)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->role = $role;
    }
    /**
     *  [create 管理员添加和更新]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T22:58:20+0800
     *  @param    [type]                   $request [description]
     *  @return   [type]                            [description]
     */
    public function create($request)
    {
        $data = $request->all();
        try {
            if(isset($data['id']) && $data['id'] > 0){
                $this->validator->with( $data )->passesOrFail( ValidatorInterface::RULE_UPDATE );
                $data['password']=bcrypt($data['password']);
                if( $this->repository->update( $data ,$data['id'])){
                    return $this->respondWithSuccess(1, '修改成功');
                }
                return $this->respondWithErrors('修改失败',400);
            }else{
                $this->validator->with( $data )->passesOrFail( ValidatorInterface::RULE_CREATE );
                $data['password']=bcrypt($data['password']);
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
     *  [getUserList description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T23:21:59+0800
     *  @param    string                   $value [description]
     *  @return   [type]                          [description]
     */
    public function getUserList($request)
    {
        return $this->respondWithSuccess($this->repository->getUserList($request), '返回成功');
    }
    /**
     *  [findById 管理员根据id查询]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T23:35:53+0800
     *  @param    [type]                   $id [description]
     *  @return   [type]                       [description]
     */
    public function findById($id)
    {
        return $this->repository->find($id)->toJson();
    }
    /**
     *  [destroy 管理员删除]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-20T12:39:33+0800
     *  @param    [type]                   $id [description]
     *  @return   [type]                       [description]
     */
    public function destroy($id)
    {
        $res = $this->repository->destroy($id);
        if($res){
            return $this->respondWithSuccess(1, '删除成功');
        }
        return $this->respondWithErrors('删除失败',400);
    }
    /**
     *  [editRoles 管理员的角色视图]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-20T00:23:33+0800
     *  @param    [type]                   $request [description]
     *  @return   [type]                            [description]
     */
    public function getRoles($id)
    {
        $data = $this->repository->getRoles($id);
        return $this->respondWithSuccess($data, '添加成功');
    }
    /**
     *  [roleList 角色列表]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-20T00:48:59+0800
     *  @return   [type]                   [description]
     */
    public function roleList()
    {
       return $this->role->roleList();
    }
    /**
     *  [updateRoles 角色更新]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-20T12:37:23+0800
     *  @param    [type]                   $request [description]
     *  @return   [type]                            [description]
     */
    public function updateRoles($request)
    {
        $input = $request->except('_token');
        $res = $this->repository->updateRoles($input);
        if($res){
            return $this->respondWithSuccess(1, '添加成功');
        }
        return $this->respondWithErrors('添加失败',400);
    }
}