class MedianFinder {
    /**
     */
    private $lowStorage;
    private $highStorage;
    
    function __construct() {
        $this->lowStorage = new SplMaxHeap();
        $this->highStorage = new SplMinHeap();
    }
  
    /**
     * @param Integer $num
     * @return NULL
     */
    function addNum($num) {
        $this->lowStorage->insert($num);
        $this->highStorage->insert($this->lowStorage->extract());
        if($this->highStorage->count() > $this->lowStorage->count() ){
            $this->lowStorage->insert($this->highStorage->extract());
        }
    }
  
    /**
     * @return Float
     */
    function findMedian() {
        if($this->lowStorage->count() == $this->highStorage->count()) {
            return ($this->lowStorage->top() + $this->highStorage->top()) / 2;
        }
        return $this->lowStorage->top();
    }
}

/**
 * Your MedianFinder object will be instantiated and called as such:
 * $obj = MedianFinder();
 * $obj->addNum($num);
 * $ret_2 = $obj->findMedian();
 */