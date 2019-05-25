<?php
/**
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
$node5->next = $node3;
$status = detectCycle($node1);
print_r($status)
?>
