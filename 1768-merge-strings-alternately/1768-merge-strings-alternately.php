class Solution {

    /**
     * @param String $word1
     * @param String $word2
     * @return String
     */
    function mergeAlternately($word1, $word2) {
        $merged = '';
        $p1 = 0;
        $p2 = 0;
        while($word1[$p1] && $word2[$p2]){
            $merged = $merged . $word1[$p1] . $word2[$p2];
            $p1++;
            $p2++;
        }
        if($word1[$p1] == null && $word2[$p2]){
            while($word2[$p2]){
                $merged = $merged . $word2[$p2];
                $p2++;
            }
        }
        if($word2[$p2] == null && $word1[$p1]){
            while($word1[$p1]){
                $merged = $merged . $word1[$p1];
                $p1++;
            }
        }

        return $merged;



    }
}