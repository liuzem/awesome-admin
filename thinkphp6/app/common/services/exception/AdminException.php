<?php


namespace app\common\services\exception;


use Throwable;

class AdminException extends \RuntimeException
{
    public function __construct($message, $code = 0, Throwable $previous = null)
    {
        if (is_array($message)) {
            $errInfo = $message;
            $message = $errInfo[1] ?? '未知错误';
            $code = $errInfo[0] ?? 400;
        }

        parent::__construct($message, $code, $previous);
    }
}