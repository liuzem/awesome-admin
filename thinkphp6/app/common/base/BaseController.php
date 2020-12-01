<?php
declare (strict_types=1);

namespace app\common\base;

use think\App;
use think\exception\ValidateException;
use think\Validate;

/**
 * author: conlecl@163.com
 * 控制器基础类
 */
abstract class BaseController
{
    /**
     * Request实例
     * @var \think\Request
     */
    protected $request;

    /**
     * 应用实例
     * @var \think\App
     */
    protected $app;

    /**
     * 是否批量验证
     * @var bool
     */
    protected $batchValidate = false;

    /**
     * 控制器中间件
     * @var array
     */
    protected $middleware = [];

    /**
     * 构造方法
     * @access public
     * @param App $app 应用对象
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->request = $this->app->request;

        // 控制器初始化
        $this->initialize();
    }

    // 初始化
    protected function initialize()
    {
    }

    /**
     * 验证数据
     * @access protected
     * @param array $data 数据
     * @param string|array $validate 验证器名或者验证规则数组
     * @param array $message 提示信息
     * @param bool $batch 是否批量验证
     * @return array|string|true
     * @throws ValidateException
     */
    protected function validate(array $data, $validate, array $message = [], bool $batch = false)
    {
        if (is_array($validate)) {
            $v = new Validate();
            $v->rule($validate);
        } else {
            if (strpos($validate, '.')) {
                // 支持场景
                [$validate, $scene] = explode('.', $validate);
            }
            $class = false !== strpos($validate, '\\') ? $validate : $this->app->parseClass('validate', $validate);
            $v = new $class();
            if (!empty($scene)) {
                $v->scene($scene);
            }
        }

        $v->message($message);

        // 是否批量验证
        if ($batch || $this->batchValidate) {
            $v->batch(true);
        }

        return $v->failException(true)->check($data);
    }

    /**
     * 接收参数
     * @param array $params
     * @param string $type
     * @return array
     */
    protected function parameter(array $params, string $type = 'json')
    {
        $request = $this->request;
        if ($request->isPost()) {
            $data = $request->post();
        } elseif ($request->isGet()) {
            $data = $request->get();
        } else {
            return [];
        }
        $ret = [];
        foreach ($params as $v) {
            if (is_array($v)) {
                $ret[$v[1]] = isset($data[$v[1]]) ? $data[$v[1]] : $v[2];
            } elseif (is_string($v)) {
                $ret[$v[1]] = isset($data[$v]) ? $data[$v] : '';
            }
        }
        return $ret;
    }

    public function success($msg, $data = [], $code = 200)
    {
        return $this->result($code, $msg, $data);
    }

    public function fail($msg, $data = [], $code = 400)
    {
        return $this->result($code, $msg, $data);
    }

    /**
     * @param $code
     * @param string $msg
     * @param array $data
     * @return string
     */
    public function result($code, $msg = '', $data = [])
    {
        if (is_array($msg)) {
            $data = $msg;
            $msg = $code == 200 ? 'success' : 'error';
        }
//        return json_encode(compact('code', 'msg', 'data'));
        exit(json_encode(compact('code', 'msg', 'data')));
    }

}
