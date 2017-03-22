<?php
/**
 * Author: dungang
 * Date: 2017/3/21
 * Time: 13:38
 */

namespace dungang\duoshuo\widgets;


use yii\helpers\Html;
use yii\base\Widget;
use yii\helpers\Url;
use yii\web\View;

abstract class DuoShuo extends Widget
{

    /**
     * @var string 简称
     */
    public $shortName;


    public final function run(){

        $this->getView()->registerJs('
        var duoshuoQuery = {short_name:"'.$this->shortName.'"};
        (function() {
            var ds = document.createElement(\'script\');
            ds.type = \'text/javascript\';ds.async = true;
            ds.src = (document.location.protocol == \'https:\' ? \'https:\' : \'http:\') + \'//static.duoshuo.com/embed.js\';
            ds.charset = \'UTF-8\';
            (document.getElementsByTagName(\'head\')[0]
            || document.getElementsByTagName(\'body\')[0]).appendChild(ds);
        })();
    ',View::POS_END,'duoshuo');
        return $this->renderWidget();
    }

    public abstract function renderWidget();


}