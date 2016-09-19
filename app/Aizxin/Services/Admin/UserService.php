<?php
namespace Aizxin\Services\Admin;

use Aizxin\Services\CommonService;
use Aizxin\Repositories\Eloquent\Admin\UserRepository;
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
     *  [__construct description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T10:33:33+0800
     *  @param    UserRepository           $repository [description]
     *  @param    UserValidator            $validator  [description]
     */
    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
}