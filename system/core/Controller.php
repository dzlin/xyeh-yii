<?php

namespace application\core;

use CController;
use Yii;

/**
 * 基本控制器类
 */
class Controller extends CController
{

    /**
     * 布局文件
     * @var string
     */
    public $layout = 'application.views.layouts.main';

    /**
     * 模块静态资源文件路径
     * @var string
     */
    private $_assetsUrl;

    /**
     * 用户登录检查
     * @return boolean
     */
    protected function isLogin()
    {
        //Yii::app()->session['user'] = '1';
        //Yii::app()->session['user'];
        if (Yii::app()->session['uid'] > 0) {
            return true;
        }
        return false;
    }

    /**
     * @todo 完成错误提示页面
     * @param type $message
     * @param type $url
     * @param type $params
     */
    public function error($message, $url = null, $params = array())
    {
        header('Content-Type:text/html;charset=utf-8');
        var_dump($message);
        die;
//        $viewPath = $basePath = Ibos::app()->getViewPath();
//        $viewFile = $this->resolveViewFile('error', $viewPath, $basePath);
//        $output = $this->renderFile($viewFile, $params, true);
//        echo $output;
    }

    public function getAssetsUrl()
    {
        if ($this->_assetsUrl === null) {
            $module = Yii::app()->controller->module->id;
            $path = 'application.modules.' . $module . '.assets';
            $this->_assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias($path));
        }
        return $this->_assetsUrl;
    }

    public function setAssetsUrl($value)
    {
        $this->_assetsUrl = $value;
    }

}
