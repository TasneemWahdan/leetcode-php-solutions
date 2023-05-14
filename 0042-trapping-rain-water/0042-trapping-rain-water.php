class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
        $size = sizeof($height);
        if($size <=  1)
            return 0;
        $leftMax = $height[0];
        $rightMax = $height[$size - 1];
        $left = 0;
        $right = $size -1;
        $res =0;

        while($left < $right){
            if($leftMax <= $rightMax){
                $left++;
                $leftMax = max($leftMax, $height[$left]);
                $res += $leftMax - $height[$left];
            }
            else{
                $right--;
                $rightMax = max($rightMax, $height[$right]);
                $res += $rightMax - $height[$right]; 
            }
        }
        return $res;
    }
}