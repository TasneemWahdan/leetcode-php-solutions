class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function orangesRotting($grid) {
        $minutes = 0;
        $directions = [[0,1],[1,0] , [-1,0], [0,-1]];
        $rows= sizeof($grid);
        $cols= sizeof($grid[0]);
        $fresh =0;
        $queue =[];
        for($i = 0 ; $i< $rows; $i++){
            for($j = 0; $j < $cols; $j++){
                if($grid[$i][$j] == 2)
                    array_push($queue, [$i , $j]); //push inex of rotten orange to queue
                if($grid[$i][$j] == 1)
                    $fresh++;    // count fresh oranges at the beginning
            }
        }

        while($queue && $fresh > 0){
            $size = sizeof($queue);
            for($i = 0; $i < $size; $i++){
                $rotten = array_shift($queue);
                $r = $rotten[0];
                $c = $rotten[1];
                foreach($directions as $dir){
                    $row = $dir[0] + $r;
                    $col = $dir[1] + $c;
                    if($row < 0 || $row == $rows || $col < 0 || $col == $cols || $grid[$row][$col] != 1)
                        continue;
                    $grid[$row][$col] = 2;
                    $fresh--;
                    array_push($queue, [$row, $col]);    
                }
            }
            $minutes ++;
        }
        if($fresh == 0)
            return $minutes;
        else
            return -1;
    }
}