<?php

namespace app\common\services\auth;

use app\common\lib\error\ApiErrDesc;
use app\common\services\exception\AdminException;
use Firebase\JWT\JWT;
use think\facade\Cache;
use think\facade\Config;

class JwtAuth
{
    /**
     * token
     * @var string
     */
    protected $token;

    /**
     * @param int $id
     * @param string $type
     * @param array $params
     * @return array
     */
    public function createToken(int $id, string $type, array $params = [])
    {
        $tokenInfo = $this->getToken($id, $type, $params);
        $exp = $tokenInfo['params']['exp'] - $tokenInfo['params']['iat'] + 60;
        $res = Cache::set($tokenInfo['token'], ['uid' => $id, 'type' => $type, 'token' => $tokenInfo['token'], 'exp' => $exp], (int)$exp);
        if (!$res) {
            throw new AdminException(ApiErrDesc::ERR_CREATE_TOKEN);
        }
        return $tokenInfo;
    }

    /**
     * 获取token
     * @param int $id
     * @param string $type
     * @param array $params
     * @return array
     */
    public function getToken(int $id, string $type, array $params = []): array
    {
        $host = app()->request->host();
        $time = time();

        $params += [
            'iss' => $host,
            'aud' => $host,
            'iat' => $time,
            'nbf' => $time,
            'exp' => strtotime('+ ' . Config::get('jwt.exp') . 'hour'),
        ];
        $params['jti'] = compact('id', 'type');
        $token = JWT::encode($params, Config::get('jwt.key'));

        return compact('token', 'params');
    }

    /**
     * 解析token
     * @param string $jwt
     * @return array
     */
    public function parseToken(string $jwt): array
    {
        $this->token = $jwt;
        list($head64, $body64, $crypto64) = explode('.', $this->token);
        $payload = JWT::jsonDecode(JWT::urlsafeB64Decode($body64));
        return [$payload->jti->id, $payload->jti->type];
    }

    /**
     * 验证token
     */
    public function verifyToken()
    {
        JWT::$leeway = 60;

        JWT::decode($this->token, Config::get('jwt.key'), ['HS256']);

        $this->token = null;
    }

}