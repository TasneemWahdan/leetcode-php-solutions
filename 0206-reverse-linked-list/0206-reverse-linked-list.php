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
     * @return ListNode
     */
    function reverseList($head){
        if($head->next == null || $head == null)
            return $head;
        $curr = $head;
        $prev= null;
        $next = $curr->next;
        while($curr != null){
            $curr->next = $prev;
            $prev = $curr;
            $curr = $next;
            $next = $next->next;
        }
        return $prev;
    } 
    function reverseList2($head) {
        $st=[];
        $p=$head;
        while($p!=null){
            array_push($st,$p->val);
            $p=$p->next;
        }
        //print_r(($st));
        $length=count($st);
        $r=new ListNode();
        $tail=$r;
        for($i=0;$i<$length;$i++){
            $n=new ListNode(array_pop($st),null);
            $tail->next=$n;
            //$tail->val=array_pop($st);
            $tail=$tail->next;
        }
        return $r->next;
    }
}