class Solution {

    /**
     * @param Integer[] $stones
     * @return Integer
     */
    function lastStoneWeight($stones) {
        $maxHeap = new SplMaxHeap();
        foreach($stones as $stone){
            $maxHeap->insert($stone);
        }
        while($maxHeap->count() > 1){
            $firstMax = $maxHeap->extract();
            $secondMax = $maxHeap->extract();
            if($firstMax != $secondMax){
                $maxHeap->insert($firstMax - $secondMax);
            }
        }
        return $maxHeap->isEmpty() ? 0 : $maxHeap->top();
    }
}