<?php
/**
 * Author: dungang
 * Date: 2017/3/21
 * Time: 14:10
 */

namespace dungang\duoshuo\widgets;


use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Class Thread 多说评论框
 * @package dungang\duoshuo\widgets
 */
class Thread extends DuoShuo
{
    /**
     * @var string 请将此处替换成文章在你的站点中的ID
     */
    public $id;

    /**
     * @var string 文章图片地址，将用于转发时的附图。
     */
    public $image;

    /**
     * @var string 请替换成文章的标题
     */
    public $title;

    /**
     * @var  array 请替换成文章的网址
     */
    public $url;
    /**
     * @var string 作者在本站中的id。对于wordpress插件，文章如果填写该id，可以识别作者，在收到评论时，会对该作者发出邮件提醒
     */
    public $authorId;

    /**
     * @var string 该页面中评论框的位置，取值top(评论框在顶端显示),bottom(评论框在底端显示)
     */
    public $formPosition = 'bottom';


    /**
     * @var int 单页显示评论数，取值范围:1～200;
     */
    public $limit = 20;

    /**
     * @var string 排序方式，取值：asc(从旧到新),desc(从新到旧)
     */
    public $order = 'desc';

    /**
     * @return string
     */
    public function renderWidget()
    {
        $this->url = Url::to($this->url, true);
        return Html::tag('div', '', [
            'class' => 'ds-thread',
            'data-thead-key' => $this->id,
            'data-title' => $this->title,
            'data-author-key' => $this->authorId,
            'data-image' => $this->image,
            'data-url' => $this->url,
            'data-form-position' => $this->formPosition,
            'data-limit' => $this->limit,
            'data-order' => $this->order,
        ]);
    }
}