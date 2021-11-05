<?php
class UniqueMessageID{

    /**
     * 消息序列号
     * 简易的雪花算法生成唯一消息ID
     *
     * @return string
     */
    public function UniqueMsgID(){
        $serverIP = explode('.', (isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : "127.0.0.1"));
        $serverID = $serverIP[2].$serverIP[3];
        $timestamp = intval(microtime(true) * 10000);
        $date = date("Ymd", time());
        $incr = Redis::incr('snowflake_'.$date);
        //$incr = sprintf("%05d", $incr);
        return (string)$timestamp.$serverID.$incr;
    }
}