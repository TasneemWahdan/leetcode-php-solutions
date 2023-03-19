class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
        if(sizeof($strs)==0 || sizeof($strs)==1){
            return array($strs);
        }
        $res=[];
        $hash=[];

        foreach($strs as $key=>$str){
            $tmp=str_split($str);
            sort($tmp);
            $tmp = implode($tmp);
            if(! isset($hash[$tmp]))
                $hash[$tmp]=[$key];
            else
                $hash[$tmp] []=$key;
        }
        foreach($hash as $set){
            $subRes = [];
            foreach($set as $idx){
                $subRes [] = $strs[$idx];
            }
            $res []= $subRes; 
        }
        return $res;
    }
}