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
            $this->validator->with( $data )->passesOrFail( ValidatorInterface::RULE_CREATE );
            if( $this->repository->create( $data )){
                return $this->respondWithSuccess(1, '添加成功');
            }
            return $this->respondWithErrors('添加失败',400);

        } catch (ValidatorException $e) {
            return $this->respondWithErrors( $e->getMessageBag()->first() , 422);
        }
    }
    /**
     *  [find description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-15T11:19:55+0800
     *  @param    [type]                   $id [description]
     *  @return   [type]                       [description]
     */
    public function find($id)
    {
        return $this->$repository->find($id);
    }
}