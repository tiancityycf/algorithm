package main
//反转单链表
import (
	"fmt"
)

type ListNode struct {
	Val  int
	Next *ListNode
}

func main() {
	var temp *ListNode
	for i := 1; i < 6; i++ {
		var tmp ListNode
		if i == 1 {
			tmp = ListNode{i, nil}
		} else {
			tmp = ListNode{i, temp}
		}
		temp = &tmp
		fmt.Println((*temp).Val)
	}
	//fmt.Println(((*temp).Next).Val)
	result := reverseList(temp)
	fmt.Println(result)
}

/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func reverseList(head *ListNode) *ListNode {
	var current *ListNode
	var pre *ListNode = nil
	for head != nil {
		next := (*head).Next
		current = head
		(*current).Next = pre
		pre = current
		head = next
	}
	return current
}