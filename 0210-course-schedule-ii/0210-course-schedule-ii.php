class Solution {

    /**
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @return Integer[]
     */
    function findOrder($numCourses, $prerequisites) {
        if(sizeof($prerequisites) == 0){
            $res = [];
            for($i=1; $i < $numCourses; $i++){
                $res[$i] =$numCourses-$i;
            }
        }
        $indegree = array_fill(0, $numCourses-1, 0);
        $preMap=[];
        $ordering = [];
        
        //$preMap = [];
        for( $i =0; $i < $numCourses; $i++){
            $preMap[$i] = [];
        }
        foreach($prerequisites as $pair){
            $crs = $pair[0];
            $pre = $pair[1];
            array_push($preMap[$pre], $crs);
            $indegree[$crs] ++;     
        }

        $queue= new SplQueue();
        for($i =0; $i < $numCourses; $i++){
            if($indegree[$i] == 0){
                $queue->enqueue($i);
            }
        }
        $count =0;
        while(! $queue->isEmpty()){
            $first = $queue->dequeue();
            $count++;
            array_push($ordering, $first);
            foreach($preMap[$first] as $x){
                $indegree[$x]=$indegree[$x]-1;
                if($indegree[$x] == 0)
                    $queue->enqueue($x);
            }
        }
        if($count != $numCourses)
            return [];
        return $ordering; 
    }

}