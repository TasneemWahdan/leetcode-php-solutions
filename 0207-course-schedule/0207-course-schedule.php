class Solution {

    /**
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @return Boolean
     */
    function canFinish($numCourses, $prerequisites) {
        $adj = [];
        $indegree = array_fill(0, $numCourses-1, 0);
        //$order =[];

        for ($i = 0; $i < $numCourses; $i++) {
            $adj[$i] = [];
        }
        
        foreach ($prerequisites as $p) {
            $adj[$p[1]][] = $p[0];
            $indegree[$p[0]]++;
        }
        $q = new SplQueue();
        for($i =0; $i < $numCourses; $i++){
            if($indegree[$i] == 0){
                $q->enqueue($i);
            }
        }
        $count =0;
        while(! $q->isEmpty()){
            $first = $q->dequeue();
            $count++;
            //$order []= $first;
            foreach($adj[$first] as $neighbor){
                $indegree[$neighbor]--;
                if($indegree[$neighbor] == 0){
                    $q->enqueue($neighbor);
                }
            }
        }
        //print_r($order);
        if($count != $numCourses)
            return false;
        return true;  
        // if(sizeof($order) == $numCourses)
        //     return true;
        // return false;      
        
    }



   
}