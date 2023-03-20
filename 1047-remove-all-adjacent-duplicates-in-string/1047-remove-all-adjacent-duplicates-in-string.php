class Solution {

    /**
     * @param String $s
     * @return String
     */
    function removeDuplicates($s) {
        $stack = new SplStack();
        $stack->push($s[0]);
        for($i = 1; $i < strlen($s); $i++){
            if($stack->isEmpty())
                $stack->push($s[$i]);
            else{
                if($stack->top() == $s[$i])
                    $stack->pop();
                else
                    $stack->push($s[$i]);    
            }    
        }
        $res ='';
        foreach($stack as $char){
            $res = $char . $res;
        }
        return $res;
    }
}