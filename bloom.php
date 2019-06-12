<?php

class BloomFilter {
    /**
     * Size of the bit array
     *
     * @var int
     */
    protected $m;

    /**
     * Number of hash functions
     *
     * @var int
     */
    protected $k;

    /**
     * Number of elements in the filter
     *
     * @var int
     */
    protected $n;

    /**
     * The bitset holding the filter information
     *
     * @var array
     */
    protected $bitset;

    /**
     * 计算最优的hash函数个数：当hash函数个数k=(ln2)*(m/n)时错误率最小
     *
     * @param int $m bit数组的宽度（bit数）
     * @param int $n 加入布隆过滤器的key的数量
     * @return int
     */
    public static function getHashCount($m, $n) {
        return ceil(($m / $n) * log(2));
    }

    /**
     * Construct an instance of the Bloom filter
     *
     * @param int $m bit数组的宽度（bit数） Size of the bit array
     * @param int $k hash函数的个数 Number of different hash functions to use
     */
    public function __construct($m, $k) {
        $this->m = $m;
        $this->k = $k;
        $this->n = 0;

        /* Initialize the bit set */
        $this->bitset = array_fill(0, $this->m - 1, false);
    }

    /**
     * False Positive的比率：f = (1 – e-kn/m)k
     * Returns the probability for a false positive to occur, given the current number of items in the filter
     *
     * @return double
     */
    public function getFalsePositiveProbability() {
        $exp = (-1 * $this->k * $this->n) / $this->m;

        return pow(1 - exp($exp),  $this->k);
    }

    /**
     * Adds a new item to the filter
     *
     * @param mixed Either a string holding a single item or an array of
     *              string holding multiple items.  In the latter case, all
     *              items are added one by one internally.
     */
    public function add($key) {
        if (is_array($key)) {
            foreach ($key as $k) {
                $this->add($k);
            }
            return;
        }

        $this->n++;

        foreach ($this->getSlots($key) as $slot) {
            $this->bitset[$slot] = true;
        }
    }

    /**
     * Queries the Bloom filter for an element
     *
     * If this method return FALSE, it is 100% certain that the element has
     * not been added to the filter before.  In contrast, if TRUE is returned,
     * the element *may* have been added to the filter previously.  However with
     * a probability indicated by getFalsePositiveProbability() the element has
     * not been added to the filter with contains() still returning TRUE.
     *
     * @param mixed Either a string holding a single item or an array of
     *              strings holding multiple items.  In the latter case the
     *              method returns TRUE if the filter contains all items.
     * @return boolean
     */
    public function contains($key) {
        if (is_array($key)) {
            foreach ($key as $k) {
                if ($this->contains($k) == false) {
                    return false;
                }
            }

            return true;
        }

        foreach ($this->getSlots($key) as $slot) {
            if ($this->bitset[$slot] == false) {
                return false;
            }
        }

        return true;
    }

    /**
     * Hashes the argument to a number of positions in the bit set and returns the positions
     *
     * @param string Item
     * @return array Positions
     */
    protected function getSlots($key) {
        $slots = array();
        $hash = self::getHashCode($key);
        mt_srand($hash);

        for ($i = 0; $i < $this->k; $i++) {
            $slots[] = mt_rand(0, $this->m - 1);
        }

        return $slots;
    }

    /**
     * 使用CRC32产生一个32bit（位）的校验值。
     * 由于CRC32产生校验值时源数据块的每一bit（位）都会被计算，所以数据块中即使只有一位发生了变化，也会得到不同的CRC32值。
     * Generates a numeric hash for the given string
     *
     * Right now the CRC-32 algorithm is used.  Alternatively one could e.g.
     * use Adler digests or mimick the behaviour of Java's hashCode() method.
     *
     * @param string Input for which the hash should be created
     * @return int Numeric hash
     */
    protected static function getHashCode($string) {
        return crc32($string);
    }

}



$items = array("first item", "second item", "third item");

/* Add all items with one call to add() and make sure contains() finds
 * them all.
 */
$filter = new BloomFilter(100, BloomFilter::getHashCount(100, 3));
$filter->add($items);

//var_dump($filter); exit;
$items = array("firsttem", "seconditem", "thirditem");
foreach ($items as $item) {
 var_dump(($filter->contains($item)));
}


/* Add all items with multiple calls to add() and make sure contains()
* finds them all.
*/
$filter = new BloomFilter(100, BloomFilter::getHashCount(100, 3));
foreach ($items as $item) {
	$filter->add($item);
}
$items = array("fir sttem", "secondit em", "thir ditem");
foreach ($items as $item) {
 var_dump(($filter->contains($item)));
}

?>
