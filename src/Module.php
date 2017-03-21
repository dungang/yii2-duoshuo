<?php
/**
 * Author: dungang
 * Date: 2017/3/21
 * Time: 14:23
 */

namespace dungang\duoshuo;


class Module extends \yii\base\Module
{

    /**
     * @var \dungang\duoshuo\converts\Sync
     */
    public $sync;

    /**
     * @var string 站点设置当中查看
     */
    public $secret = '站点设置当中查看';

    /**
     * @var string 站点设置当中查看
     */
    public $short_name = '站点设置当中查看';
}