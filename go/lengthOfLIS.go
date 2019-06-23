package main

import "fmt"

/**
* 动态规划法（时间复杂度O(N^2))
* 设长度为N的数组为{a0，a1, a2, ...an-1)，则假定以aj结尾的数组序列的最长递增子序列长度为L(j)
* 则L(j)={ max(L(i))+1, i<j且a[i]<a[j] }。也就是说，我们需要遍历在j之前的所有位置i(从0到j-1)
* 找出满足条件a[i]<a[j]的L(i)，求出max(L(i))+1即为L(j)的值。最后，我们遍历所有的L(j)（从0到N-1），找出最大值即为最大递增子序列。时间复杂度为O(N^2)。
 */
func lengthOfLIS(nums []int) int {
	var length = len(nums)
	if (length == 0) {
		return 0
	}
	var m = make(map[int]int)

	for k, _ := range nums {
		m[k] = 1
	}

	for i := 0; i < length; i++ {
		for j := 0; j <= i; j++ {
			if (nums[j] < nums[i] && m[i] < m[j]+1) {
				m[i] = m[j] + 1
			}
		}
	}
	var max = 1
	for _, v := range m {
		if (v > max) {
			max = v
		}
	}
	//fmt.Println(m)
	return max
}
func main() {
	//a []int = make([]int,10)

	a := []int{10, 9, 2, 5, 3, 7, 101, 18}

	var m = lengthOfLIS(a)
	fmt.Println(m)

}
