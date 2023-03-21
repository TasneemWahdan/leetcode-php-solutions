class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        $stack = new SplStack();
        $hash = [ ')' => '(',
                   '}' => '{',
                   ']' => '[' ];
        for($i = 0; $i < strlen($s); $i++){
            if($stack->isEmpty())
                $stack->push($s[$i]);
            else{
                if($hash[$s[$i]] == $stack->top()){
                    $stack->pop();
                }
                else
                    $stack->push($s[$i]);
            }
            
        }
        return $stack->isEmpty()?true:false;
    }
}