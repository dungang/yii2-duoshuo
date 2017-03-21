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
    /**
     * @var int 显示最新评论的条数，最大支持200条
     */
    public $numItems = 5;

    /**
     * @var int 是否显示头像，1：显示，0：不显示
     */
    public $showAvatars = 1;

    /**
     * @var int 是否显示时间，1：显示，0：不显示
     */
    public $showTime = 1;

    /**
     * @var int 是否显示标题，1：显示，0：不显示
     */
    public $showTitle = 1;

    /**
     * @var int 是否显示管理员的评论，1：显示，0：不显示
     */
    public $showAdmin = 1;

    /**
     * @var int 最大显示评论汉字数
     */
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