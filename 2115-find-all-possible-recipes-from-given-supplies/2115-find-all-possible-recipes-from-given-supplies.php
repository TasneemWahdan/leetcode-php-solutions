class Solution {

    /**
     * @param String[] $recipes
     * @param String[][] $ingredients
     * @param String[] $supplies
     * @return String[]
     */
    function findAllRecipes($recipes, $ingredients, $supplies) {
        $res = [];
        $indegrees = array_fill(0, sizeof($recipes), 0);
        foreach($recipes as $i=>$recipe){
            $indegrees[$recipe] = sizeof($ingredients[$i]);
        }
        $supHash =[];
        $q = new SplQueue();
        foreach($supplies as $supply){
            $supHash[$supply] = [];
            $q->enqueue($supply);
        }

        $recipesHash =[];
        foreach($recipes as $i=>$r){
            foreach($ingredients[$i] as $ing){
                if(isset($supHash[$ing]))
                    $supHash[$ing] []= $r;
                else
                    $supHash[$ing] = [$r];    
            }
            $recipesHash[$r] = 1;
        }
        
        
        $res =[];
        while(! $q->isEmpty()){
            $supply = $q->dequeue();
            if(isset($recipesHash[$supply])){
                $res []= $supply;
            }
            foreach($supHash[$supply] as $recipe){
                $indegrees[$recipe]--;
                if($indegrees[$recipe] == 0){
                    $q->enqueue($recipe);
                }
            }
        }
        return $res;
    }
}