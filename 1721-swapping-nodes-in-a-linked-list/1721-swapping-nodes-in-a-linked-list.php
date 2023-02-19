/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function swapNodes($head, $k) {
        $count = $this->countNodesInList($head);
        $firstVal = 0;
        $secondVal =0;
        $secondPtr =$head;
        $second = $count -$k; //3 
        while($second > 0){
            $secondPtr =$secondPtr->next;
            $second--;
        }
        $secondVal = $secondPtr->val;
        $firstPtr = $head;
        while($k > 1){
            $firstPtr = $firstPtr->next;
            $k--;
        }
        $secondPtr->val = $firstPtr->val;
        $firstPtr->val = $secondVal;
        return $head;
    }

    function countNodesInList($head){
        $count = 0;
        $p =$head;
        while($p != null){
            $count++;
            $p = $p->next;
        }
        return $count;
    } 
}