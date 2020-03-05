<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;


class ApiException extends HttpException
{
    protected $data = [];

    public function __construct($message, $code = ExceptionCode::ERROR, $data = [], $statusCode=400){
        $this->data = $data;
        parent::__construct($statusCode, $message, null, [], $code);
    }

    //允许业务错误时，自定义提示信息
    public function getData()
    {
        return $this->data;
    }
}
