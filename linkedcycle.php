<?php
/**
 * 判断单链表是否有环
 * 原理：如何判断是否有环？如果有两个头结点指针，一个走的快（一次走2步），一个走的慢（一次一步），那么若干步以后，快的指针总会超过慢的指针一圈。
 */
class ListNode {
	public $next = null;
	public $val;
	public function __construct($val) {
		$this->val = $val;
	}
}
function detectCycle($headNode) {
	$node1 = $headNode->next->next;
	$node2 = $headNode->next;
	while ($node1 !== null && $node2 !== null) {
		if ($node1 === $node2) {
			return true;
		}
		$node1 = $node1->next->next;
		$node2 = $node2->next;
	}
	return false;
}
/**
 * 求有环单链表的环长
 * 原理：在环上相遇后，记录第一次相遇点为Pos，之后指针slow继续每次走1步，fast每次走2步。在下次相遇的时候fast比slow正好又多走了一圈，也就是多走的距离等于环长。
 * 设slow走了len步，则fast走了2*len步，相遇时多走了一圈：
 * 环长=2*len-len。
 */
function detectLen($headNode){
	$node1 = $headNode->next->next;
	$node2 = $headNode->next;
        $len = -1;
	while ($node1 !== null && $node2 !== null) {
		if($len >=0){
			$len++;
		}
		if ($node1 === $node2) {
			if($len ==-1){
				$len = 0;
			}else{
				return $len;
			}
		}
		$node1 = $node1->next->next;
		$node2 = $node2->next;
	}
	return $len;
}
/**
 * 求有环单链表的环连接点位置
 * 原理：.如何判断环的入口点：碰撞点p到连接点的距离=头指针到连接点的距离，因此，分别从碰撞点、头指针开始走，相遇的那个点就是连接点。
 *（1）当fast与slow相遇时，slow肯定没有走完链表，而fast已经在环里走了n（n>= 1）圈。假设slow走了s步，那么fast走了2s步。fast的步数还等于s走的加上环里转的n圈，所以有：2s = s + nr。因此，s = nr。
 *（2）设整个链表长为L，入口据相遇点X，起点到入口的距离为a。因为slow指针并没有走完一圈，所以：
 * a + x = s，带入第一步的结果，有：a + x = nr = (n-1)r + r = (n-1)r + L - a；即：
 * a = (n-1)r + L -a -x;
 * 这说明：从头结点到入口的距离，等于转了(n-1)圈以后，相遇点到入口的距离。因此，我们可以在链表头、相遇点各设一个指针，每次各走一步，两个指针必定相遇，且相遇第一点为环入口点。
 */
function detectJoin($headNode){
	$node1 = $headNode->next->next;
	$node2 = $headNode->next;
	$head = $headNode;
	$join = -1;
	while ($node1 !== null && $node2 !== null) {
		//第一次相遇时启动head的指针移动
		if ($node1 === $node2 && $join == -1) {
			$join++;	
		}
		if ($head === $node2) {
			//head指针移动且与node2相遇就是连接点的位置
			return $join;
		}
		$node1 = $node1->next->next;
		$node2 = $node2->next;
		if($join>=0){
			//head开始指针移动
			$head = $head->next;
			$join++;
		}
	}
	return $join;
}
$node1 = new ListNode(1);
$node2 = new ListNode(2);
$node3 = new ListNode(3);
$node4 = new ListNode(4);
$node5 = new ListNode(5);
$node6 = new ListNode(6);
$node1->next = $node2;
$node2->next = $node3;
$node3->next = $node4;
$node4->next = $node5;
$node5->next = $node6;
$node6->next = $node4;
$status = detectCycle($node1);
print_r($status);
$len = detectLen($node1);
print_r($len);
$join = detectJoin($node1);
print_r($join);
?>
