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

    public $range = 'daily';

    public $numItems = 5;

    /**
     * @return string
     */
    public function renderWidget()
    {
        return Html::tag('div', '', [
            'class' => 'ds-top-threads',
            'data-num-items' => $this->numItems,
            'data-range' => $this->range,
        ]);
    }
}