<?php
/**
 * Author: dungang
 * Date: 2017/3/21
 * Time: 14:27
 */

namespace dungang\duoshuo\converts;

interface Sync
{
    /**
     * 上一次同步时读到的最后一条log的ID，
     * 开发者自行维护此变量（如保存在你的数据库）。
     * @return mixed
     */
    public function getLastLogId();

    /**
     * 这条评论是刚创建的
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * 这条评论是通过的评论
     * @param array $data
     * @return mixed
     */
    public function approve(array $data);

    /**
     * 这条评论是标记垃圾的评论
     * @param array $data
     * @return mixed
     */
    public function spam(array $data);

    /**
     * 这条评论是删除的评论
     * @param array $data
     * @return mixed
     */
    public function delete(array $data);

    /**
     * 彻底删除的评论
     * @param array $data
     * @return mixed
     */
    public function deleteForever(array $data);
}