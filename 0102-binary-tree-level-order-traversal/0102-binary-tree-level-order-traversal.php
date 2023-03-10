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
    function levelOrder($root) {
        if(! $root )
            return [];
        $res = [];
        $queue=new SplQueue();
        $queue->enqueue($root);
        while(! $queue->isEmpty()){
            $size= $queue->count();
            $levelNodes= [];
            for($i =0; $i < $size; $i++){
                $front =$queue->dequeue();
                $levelNodes []= $front->val;
                if($front->left)
                    $queue->enqueue($front->left);
                if($front->right)
                     $queue->enqueue($front->right);
            }
            $res []= $levelNodes;
                
        }

        return $res;
        
    }
}