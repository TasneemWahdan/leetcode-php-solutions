class Solution {

    /**
     * @param String $s
     * @return String
     */
    function minRemoveToMakeValid($s) {
        $stack = new SplStack();
        for($i = 0; $i < strlen($s); $i++){
            if($s[$i] == '(' || $s[$i] == ')'){
                if($stack->isEmpty() )
                    $stack->push([$s[$i], $i]);
                else{
                    if($stack->top()[0] == '(' && $s[$i] == ')')
                        $stack->pop();
                    else
                        $stack->push([$s[$i], $i]);    
                }    
            }
        }
        //print_r($stack);
        for($i =0; $i < $stack->count(); $i++){
            $s = substr_replace($s, '', $stack[$i][1], 1);
        }
        return $s;
    }
}