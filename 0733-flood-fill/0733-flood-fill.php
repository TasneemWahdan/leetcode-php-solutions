class Solution {

    /**
     * @param Integer[][] $image
     * @param Integer $sr
     * @param Integer $sc
     * @param Integer $color
     * @return Integer[][]
     */
    function floodFill($image, $sr, $sc, $color) {
        if($image[$sr][$sc] == $color)
            return $image;
        $currentColor = $image[$sr][$sc]; // 1
        $directions = [[1,0], [0,1], [-1,0], [0,-1]];
        $this->bfs($sr, $sc, $image, $currentColor, $color, $directions);
        return $image;
        
    }

    function dfs($i, $j, &$image, $currentColor, $color, $directions){
        if($image[$i+$r][$j+$c] == $currentColor)
            $image[$i][$j] = $color;
        foreach($directions as $dir){
             
            $r= $dir[0];
            $c = $dir[1];
            if(!isset($image[$i+$r][$j+$c]) ||
                $image[$i+$r][$j+$c] != $currentColor ||
                $image[$i+$r][$j+$c] == $color )
                continue;
            else{
                $image[$i+$r][$j+$c] = $color;
                $this->dfs($i+$r, $j+$c, $image, $currentColor, $color, $directions);
            }
                      
        }
    }

    function bfs($i, $j, &$image, $currentColor, $color, $directions){
        $q = new SplQueue();
        $q->enqueue([$i,$j]);
        $image[$i][$j] = $color;
        while($q->count() > 0){
            $first = $q->dequeue();
            
            foreach($directions as $dir){
                $r = $dir[0] + $first[0];
                $c = $dir[1] + $first[1];
                if( isset($image[$r][$c]) && $image[$r][$c] == $currentColor ){
                    $image[$r][$c] = $color;
                    $q->enqueue([$r, $c]);
                }

            }

        }
    }
   

}