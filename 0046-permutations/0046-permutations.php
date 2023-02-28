class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($arr){
        $res =[];
        $prefix = [];
        $this->backtrack($arr, $res, $prefix);
        return $res;
    }

    function backtrack($nums, &$res, $prefix){
        if(count($nums) == 0){
            $res []= $prefix;
        return;
        }
    
        for($i = 0; $i< sizeof($nums); $i++){
            $prefix []= array_shift($nums);
            $this->backtrack($nums, $res, $prefix);
            $nums []= array_pop($prefix);
        } 
    }  
}
