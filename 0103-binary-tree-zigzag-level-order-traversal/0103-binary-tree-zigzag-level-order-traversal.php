/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function zigzagLevelOrder1($root) {
        $res=[];
        if(!$root)
            return [];
        if(! $root->left && ! $root->right)
            return [[$root->val]];
        $queue=[];
        array_push($queue,$root);
        $leftToRight=false; //next dir is right, left is taken by root level
        $step=0;
        while(count($queue) >0 ){
            $level=[];
            $size=sizeof($queue);
            for($i=0; $i < $size; $i++){
               $curr= array_shift($queue);
               if($leftToRight)
                    array_unshift($level,$curr->val);
                else
                    array_push($level, $curr->val);
                if($curr -> left)
                    array_push($queue, $curr->left);
                if($curr->right)
                    array_push($queue, $curr->right);             
            }
            $step++;
            print_r($step);
            array_push($res, $level);
            $leftToRight=! $leftToRight;
    }
    
     return $res;  
    }
    function zigzagLevelOrder($root) {
        if(! $root )
            return [];
        $res = [];
        $queue=new SplQueue();
        $queue->enqueue($root);
        $direction = 0; // left to right
        while(! $queue->isEmpty()){
            $size= $queue->count();
            $levelNodes= [];
            for($i =0; $i < $size; $i++){
                $front =$queue->dequeue();
                if($direction == 0){
                    $levelNodes []= $front->val;
                }
                else{
                    array_unshift($levelNodes, $front->val);
                }
                if($front->left)
                    $queue->enqueue($front->left);
                if($front->right)
                     $queue->enqueue($front->right);
            }
            $direction = ! $direction;
            $res []= $levelNodes;
                
        }

        return $res;
        
    }
}   