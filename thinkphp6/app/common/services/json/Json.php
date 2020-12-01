<?php


namespace app\common\services\json;


use think\Response;

class Json
{
    public function success($msg = 'success', $code = 200, ?array $data = null): Response
    {
        if (is_array($msg)) {
            $data = $msg;
            $msg = 'success';
        }
        return $this->make($code, $msg, $data);
    }

    public function fail($msg = 'fail', $code = 400, ?array $data = null): Response
    {
        if (is_array($msg)) {
            $data = $msg;
            $msg = 'fail';
        }
        return $this->make($code, $msg, $data);
    }

    public function make(int $status, string $msg, ?array $data = null): Response
    {
        $res = compact('status', 'msg');

        if (!is_null($data)) $res['data'] = $data;

        return Response::create($res, 'json', $status);
    }


}