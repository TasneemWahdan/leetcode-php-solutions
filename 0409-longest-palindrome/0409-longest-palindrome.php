class Solution {

    /**
     * @param String $s
     * @return Integer
     */
   
    function longestPalindrome($s) {
        if(strlen($s) == 1)
            return 1;

        $hash =[];
        for($i = 0; $i < strlen($s); $i++){
            if(! isset($hash[$s[$i]]))
                $hash[$s[$i]] = 1;
            else
                $hash[$s[$i]]++;
        }

        $res =0;
        foreach($hash as $char=>$count){
            if($count % 2 == 0)
                $res+= $count;
            else
                $res += $count - $count % 2;
        }

        if($res < strlen($s))
            $res++;

        return $res;            
    }

}
// aaaa c bbb
//abba 