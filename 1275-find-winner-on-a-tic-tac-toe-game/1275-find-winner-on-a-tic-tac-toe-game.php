class Solution {

    /**
     * @param Integer[][] $moves
     * @return String
     */
    function tictactoe($moves) {
        $board[0] = array_fill(0, 3, 0);
        $board []= $board[0];
        $board []= $board[0];
       
        $turn = 1; //1: player A  ,    -1 : player B
        foreach($moves as $key=>$move){
            $board[$move[0]][$move[1]] = $turn;
            if($this->isWinner($board)){
                return $turn == 1 ?'A':'B';  
            }     
            $turn = $turn*-1;
        }
        if(! $this->isPending($board))
            return 'Draw';
        return 'Pending';    
    }

    function isWinner($board){
        //check rows
        foreach($board as $row){
            if($row[0] == $row[1] && $row[1] == $row[2] && $row[0]!=0)
                return true;
        }
        //check cols
        for($c =0; $c < 3; $c++){
            if($board[0][$c] == $board[1][$c] &&  $board[1][$c]== $board[2][$c] && $board[0][$c] != 0 )
            return true;
        }
        //check diag
        if($board[0][0] == $board[1][1] && $board[1][1] == $board[2][2] && $board[0][0] != 0 )
            return true;
        
        //check neg diag
        if($board[0][2] == $board[1][1] && $board[1][1] == $board[2][0] && $board[0][2] != 0)
            return true;

        return false;
    }

    function isPending($board){
        foreach($board as $row){
            if(in_array(0, $row))
                return true;
        }
        return false;
    }
}