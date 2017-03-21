<?php
/**
 * Author: dungang
 * Date: 2017/3/21
 * Time: 14:29
 */

namespace dungang\duoshuo\controllers;


use dungang\duoshuo\components\DuoShuoException;
use yii\helpers\Json;
use yii\web\Controller;

class SyncController extends Controller
{

    /**
     * @var \dungang\duoshuo\Module
     */
    public $module;

    public function actionIndex()
    {
        if ($this->checkSignature(\Yii::$app->request->post())) {

            $limit = 20;

            $params = array(
                'limit' => $limit,
                'order' => 'asc',
            );


            if (!$lastLogId = $this->module->sync->getLastLogId())
                $lastLogId = 0;

            $params['since_id'] = $lastLogId;

            //自己找一个php的 http 库
            $response = $this->sendRequest('http://api.duoshuo.com/log/list.json?'. http_build_query($params));

            if ($response) {
                $response = Json::decode($response);
            }

            if (!isset($response['response'])) {
                //处理错误,错误消息$response['message'], $response['code']
                //...
                throw new DuoShuoException($response['code'],$response['message']);

            } else {
                //遍历返回的response，你可以根据action决定对这条评论的处理方式。
                foreach($response['response'] as $log){

                    switch($log['action']){
                        case 'create':
                            //这条评论是刚创建的
                            $this->module->sync->create($log);
                            break;
                        case 'approve':
                            //这条评论是通过的评论
                            $this->module->sync->approve($log);
                            break;
                        case 'spam':
                            //这条评论是标记垃圾的评论
                            $this->module->sync->spam($log);
                            break;
                        case 'delete':
                            //这条评论是删除的评论
                            $this->module->sync->delete($log);
                            break;
                        case 'delete-forever':
                            //彻底删除的评论
                            $this->module->sync->deleteForever($log);
                            break;
                        default:
                            break;
                    }

                    //更新last_log_id，记得维护last_log_id。（如update你的数据库）
                    if (strlen($log['log_id']) > strlen($lastLogId) || strcmp($log['log_id'], $lastLogId) > 0) {
                        $lastLogId = $log['log_id'];
                    }

                }


            }


        }
    }
    /**
     *
     * 检查签名
     *
     */
    private function checkSignature($input){

        $signature = $input['signature'];
        unset($input['signature']);

        ksort($input);
        $baseString = http_build_query($input, null, '&');
        $expectSignature = base64_encode($this->hmacsha1($baseString, $this->module->secret));
        if ($signature !== $expectSignature) {
            return false;
        }
        return true;
    }

    // from: http://www.php.net/manual/en/function.sha1.php#39492
    // Calculate HMAC-SHA1 according to RFC2104
    // http://www.ietf.org/rfc/rfc2104.txt
    private function hmacsha1($data, $key) {
        if (function_exists('hash_hmac'))
            return hash_hmac('sha1', $data, $key, true);

        $blocksize=64;
        if (strlen($key)>$blocksize)
            $key=pack('H*', sha1($key));
        $key=str_pad($key,$blocksize,chr(0x00));
        $ipad=str_repeat(chr(0x36),$blocksize);
        $opad=str_repeat(chr(0x5c),$blocksize);
        $hmac = pack(
            'H*',sha1(
                ($key^$opad).pack(
                    'H*',sha1(
                        ($key^$ipad).$data
                    )
                )
            )
        );
        return $hmac;
    }


    /**
     * @param $uri
     * @return bool|mixed
     */
    private function sendRequest($uri)
    {
        $ch = curl_init(($uri));
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $rst = curl_exec($ch);
        curl_close($ch);
        if ($rst) {
            return $rst;
        }
        return false;
    }
}