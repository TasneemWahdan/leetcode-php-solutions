class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target) {
        $size = sizeof($nums);
        $res =[];
        if($size == 0)
            return [-1, -1];
        foreach($nums as $i => $n){
            if($n == $target){
                $res [] = $i;
                break;
            }
        }
        if($res == [])
            return [-1, -1];
        if($nums[$res[0] + 1] != $target)
            return [$res[0], $res[0]];    
        for($i = $res[0]; $i< $size; $i++){
            if($i == $size-1){
                if($nums[$i] == $target)
                    $res []= $size-1;
            }
            if($nums[$i] != $target){
                $res []= $i-1;
                break;
            }
            
        }
        return $res;           
    }
}