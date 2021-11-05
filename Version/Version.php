<?php

class Version{

    /**
     * 判断版本号
     *
     * @param string $firstVersion
     * @param string $secondVersion
     * @return bool
     * @author zhangyu
     * @createTime 1/10/2019 1:55 PM
     */
    function compareVersion($firstVersion, $secondVersion = '4.0.0'){
        //初始化变量
        $firstArr = explode('.', $firstVersion);
        $secondArr = explode('.', $secondVersion);
        $firstNum = '';
        $secondNum = '';
        //进行拼接字符串操作
        for($i = 0; $i < count($firstArr); $i++){
            if($firstArr[$i] > $secondArr[$i]){
                $firstNum .= '1';
                $secondNum .= '0';
            }elseif($firstArr[$i] == $secondArr[$i]){
                $firstNum .= '1';
                $secondNum .= '1';
            }else{
                $firstNum .= '0';
                $secondNum .= '1';
            }
        }
        //进行版本比较
        return (int)$firstNum >= (int)$secondNum;
    }

}