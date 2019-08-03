package main

/**
 * 给定 n 个非负整数 a1，a2，...，an，每个数代表坐标中的一个点 (i, ai) 。
 * 在坐标内画 n 条垂直线，垂直线 i 的两个端点分别为 (i, ai) 和 (i, 0)。
 * 找出其中的两条线，使得它们与 x 轴共同构成的容器可以容纳最多的水。
 * 说明：你不能倾斜容器，且 n 的值至少为 2。
 */
import (
	"fmt"
	_ "strconv"
)

func main() {
	height := []int{1, 8, 6, 2, 5, 4, 8, 3, 7}
	result := maxArea(height)
	fmt.Println(result)
}

// 双指针 - 单向移动
func maxArea(height []int) int {
	start, end, val, max := 0, len(height)-1, 0, 0
	for !(start == end) {
		if height[start] < height[end] {
			val = height[start] * (end - start)
			start++
		} else {
			val = height[end] * (end - start)
			end--
		}
		if val > max {
			max = val
		}
	}

	return max
}
