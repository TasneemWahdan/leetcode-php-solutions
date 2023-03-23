class Solution {

    /**
     * @param Integer[][] $graph
     * @return Boolean
     */
    function isBipartite($graph) {
        if(sizeof($graph) == 1)
            return true;
        // 0 unvisited, 1 red , 2 green    
        $visited = [];
        for($i =0; $i < sizeof($graph); $i++){
            if( $visited[$i] == 0 && sizeof($graph) != 0 ){
                $visisted[$i] = 1;
                $q = new SplQueue();
                $q->enqueue($i);
                while(! $q->isEmpty()){
                    $curr = $q->dequeue();
                    $neighbors = $graph[$curr];
                    foreach($neighbors as $neighbor){
                        if($visited[$neighbor] == 0){
                            $visited[$neighbor] = ($visited[$curr] == 1) ? 2:1;
                            $q->enqueue($neighbor);
                        }
                        else{
                            if($visited[$curr] == $visited[$neighbor])
                                return false;
                        }
                    }
                }
            }   
        }
        return true;
    }
}