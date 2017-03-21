<?php
/**
 * Author: dungang
 * Date: 2017/3/21
 * Time: 14:13
 */

namespace dungang\duoshuo\widgets;
use yii\helpers\Html;

/**
 * Class RecentComments 多说最新评论
 * @package dungang\duoshuo\widgets
 */
class RecentComments extends DuoShuo
{
    public $numItems = 5;

    public $showAvatars = 1;

    public $showTime = 1;

    public $showTitle = 1;

    public $showAdmin = 1;

    public $excerptLength = 70;

    /**
     * @return string
     */
    public function renderWidget()
    {
        return Html::tag('div', '', [
            'class' => 'ds-recent-comments',
            'data-num-items' => $this->numItems,
            'data-show-avatars' => $this->showAvatars,
            'data-show-time' => $this->showTime,
            'data-show-title' => $this->showTitle,
            'data-show-admin' => $this->showAdmin,
            'data-form-position' => $this->formPosition,
            'data-excerpt-length' => $this->excerptLength,
        ]);
    }
}