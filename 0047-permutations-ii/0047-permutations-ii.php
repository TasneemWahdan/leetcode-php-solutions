class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permuteUnique($nums) {
        $res =[];
        $prefix =[];
        $this->backtrack($nums, $prefix, $res);
        return $res;
    }

    function backtrack($nums, $prefix, &$res){
        if(sizeof($nums) == 0){
            if(! in_array($prefix, $res))
                $res []= $prefix;
            return;    
        }
        for($i =0; $i< sizeof($nums); $i++){
            $prefix []= array_shift($nums);
            $this->backtrack($nums, $prefix, $res);
            //[2,3,1]
            $nums []= array_pop($prefix);
        }
    }
    // function permute($nums) {
    //     $res=[];
    //     if(sizeof($nums)==1){
    //         array_push($res,[$nums[0]]);
    //         return $res;
    //     }
    //     else{
    //         foreach($nums as $num){
    //             $first=array_shift($nums);
    //             $perms=$this->permute($nums);
    //             foreach($perms as $perm){
    //                 array_push($perm,$first);
    //                 if(! in_array($perm,$res))
    //                     array_push($res,$perm);
    //             }
    //             array_push($nums,$first);
    //         }  
    //     }
    //     return $res;
    // }
}