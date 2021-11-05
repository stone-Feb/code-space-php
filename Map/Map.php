<?php
class Map{

    /**
     * 计算两个经纬度之间的直线
     *
     * @param        $lng1
     * @param        $lat1
     * @param        $lng2
     * @param        $lat2
     * @return string 精度为千米
     * @auther zhangyu
     * @date 2019-12-25 16:59
     */
    function getDistance($lng1, $lat1, $lng2, $lat2){
        $EARTH_RADIUS = 6378.137;
        $radLat1 = $lat1 * pi() / 180.0;
        $radLat2 = $lat2 * pi() / 180.0;
        $a = $radLat1 - $radLat2;
        $b = ($lng1 * pi() / 180.0) - ($lng2 * pi() / 180.0);
        $s = 2 * asin(sqrt(pow(sin($a / 2), 2) + cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2)));
        $s = $s * $EARTH_RADIUS;
        $s = round($s * 10000) / 10000;
        return (string)round($s, 2);
    }

    /**
     * 以$lat，$lon为圆心，半径为$radius的经纬度范围
     *
     * @param     $lat
     * @param     $lon
     * @param int $radius 半径，单位：米
     * @return array
     */
    function getAround($lat, $lon, $radius = 30000){
        $pi = 3.14159265;
        $latitude = $lat;//经度
        $longitude = $lon;//纬度

        $degree = (24901 * 1609) / 360.0;
        $raidusMile = $radius;

        $dpmLat = 1 / $degree;
        $radiusLat = $dpmLat * $raidusMile;
        $minLat = $latitude - $radiusLat;//最小的经度
        $maxLat = $latitude + $radiusLat;//最大的经度
        $mpdLng = $degree * cos($latitude * ($pi / 180));
        $dpmLng = 1 / $mpdLng;
        $radiusLng = $dpmLng * $raidusMile;
        $minLng = $longitude - $radiusLng;//最小的纬度
        $maxLng = $longitude + $radiusLng;//最大的纬度
        $data = array(
            'minlat' => (string)number_format($minLat, 6, '.', ''),
            'maxlat' => (string)number_format($maxLat, 6, '.', ''),
            'minlng' => (string)number_format($minLng, 6, '.', ''),
            'maxlng' => (string)number_format($maxLng, 6, '.', '')
        );
        return $data;
    }
}