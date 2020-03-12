<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if($request->expectsJson()){
            //通过 json 响应异常时，默认字段
            $data = [
                'message'   => $e->getMessage(),
                'code'  => $e->getCode(),
                'statusCode'    => 400, //默认的响应状态码
                'data'  => [],
            ];  

            //如果异常中包含 getStatusCode 方法，则从中获取HTTP状态码
            if( method_exists( $e, 'getStatusCode' ) ){
                $data['statusCode'] = $e->getStatusCode();
            }
    
            //表单异常（需要通过 status 属性获取HTTP状态码）
            if( $e instanceof ValidationException ){
                $data['statusCode'] = $e->status;
                $data['data'] = $e->errors();
                $data['code'] = ExceptionCode::VALIDATION_ERROR;  //表单验证失败
            }

            //业务异常，可能包含 data，状态码由开发人员指定，默认为400
            if( $e instanceof ApiException ){
                $data['data'] = $e->getData();
                $data['statusCode'] = $e->getStatusCode();
            }

            //如果处于调试模式，追加调试信息
            if(config('app.debug')){
                $data['exception'] = get_class($e);
                $data['file'] = $e->getFile();
                $data['line'] = $e->getLine();
                $data['trace'] = collect($e->getTrace())->map(function ($trace) {
                    return Arr::except($trace, ['args']);
                })->all();
            }

            return response()->json($data, $data['statusCode']);          
        }
        return parent::render($request, $e);
    }
}
