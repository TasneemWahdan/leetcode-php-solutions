class Solution {

    /**
     * @param Integer $k
     * @param Integer $w
     * @param Integer[] $profits
     * @param Integer[] $capital
     * @return Integer
     */
    function findMaximizedCapital($k, $w, $profits, $capital) {
        //$currentCapital =$w;
        $minHeap = new SplMinHeap();
        foreach($capital as $key=>$c){
            $minHeap->insert([$c, $key]);
        }
        $maxHeap= new SplMaxHeap();
        for($i = 1 ; $i<= $k; $i++){
            while(!$minHeap->isEmpty() && $minHeap->top()[0] <= $w){
                $x = $minHeap->extract();
                $maxHeap->insert([$profits[$x[1]], $x[1]]);
            }
            if($maxHeap->isEmpty()){
                break;
            }
            $j = $maxHeap->extract()[0];
            $w+=$j; 
        }
       
        return $w;
    }
}