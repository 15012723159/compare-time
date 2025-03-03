<?php
/**
 * @Notes:
 * @Author: markcolin
 * @Date: 2025/2/28
 * @Time: 11:40
 * @Interface CompareTime
 * @return
 */

namespace markcolin\CompareTime;

/**
 * User: markcolin
 * Date: 2025/2/28
 * Time: 11:40
 */
class CompareTime
{
    /**
     *$time_rannge_1 eg [1740375807,1740675807]
     * $time_rannge_2 eg [1740575807,1740875807]
     * User: markcolin
     * Date: 2025/2/28
     * Time: 11:41
     */
    public function compare($time_range_1,$time_range_2){
        $all_time = [];
        foreach($time_range_1 as $time){
            array_push($all_time,$time);
        }

        foreach($time_range_2 as $time){
            array_push($all_time,$time);
        }

        $new_all_time = array_unique($all_time);
        if (count($new_all_time) != count($all_time)) {
            return false;
        }

        //完全包含
        if ($time_range_2[0] <= $time_range_1[0] && $time_range_1[1] <= $time_range_2[1]){
            return false;
        }
        //包含时间
        if($time_range_1[0] >= $time_range_2[0] && $time_range_1[0] <= $time_range_2[1]){
            return false;
        }
        //包含时间
        if($time_range_1[1] >= $time_range_2[0] && $time_range_1[1] <= $time_range_2[1]){
            return false;
        }


        //完全包含
        if ($time_range_1[0] <= $time_range_1[0] && $time_range_1[1] >= $time_range_2[1]){
            return false;
        }
        if ($time_range_2[0] >= $time_range_1[0] && $time_range_2[0] <= $time_range_1[1]){
            return false;
        }

        if ($time_range_2[1] >= $time_range_1[0] && $time_range_2[1] <= $time_range_1[1]){
            return false;
        }


        return true;
    }
}