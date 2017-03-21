<?php
/**
 * Author: dungang
 * Date: 2017/3/21
 * Time: 14:19
 */

namespace dungang\duoshuo\widgets;


use yii\helpers\Html;

class TopThreads extends DuoShuo
{

    /**
     * @var string 获取的范围。daily：每日热评文章； weekly：每周热评文章； monthly：每月热评文章；all：总热评文章。
     */
    public $range = 'daily';

    /**
     * @var int 获取的条数。默认为5条
     */
    public $numItems = 5;

    /**
     * @var int 文章所属的频道
     */
    public $channelKey;

    /**
     * @return string
     */
    public function renderWidget()
    {
        return Html::tag('div', '', [
            'class' => 'ds-top-threads',
            'data-num-items' => $this->numItems,
            'data-range' => $this->range,
            'data-channel-key' => $this->channelKey,
        ]);
    }
}