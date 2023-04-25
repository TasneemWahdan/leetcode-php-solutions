class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        $left = 1;
        
        for($right =1; $right < sizeof($nums); $right++){
            if($nums[$right] != $nums[$right-1]){
                $nums[$left] = $nums[$right];
                $left++;
            }
        }

        return $left;
    }
}