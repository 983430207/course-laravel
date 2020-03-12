<?php

namespace App\Exceptions;

/**
 * 定义业务异常状态码
 */
class ExceptionCode
{
    //默认异常，仅代表有异常，但不包含具体原因
    const ERROR = -1;   

    //表单验证失败
    const VALIDATION_ERROR = 3001;
}