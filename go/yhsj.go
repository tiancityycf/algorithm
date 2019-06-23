package main

/**
 * 在杨辉三角中，每个数是它左上方和右上方的数的和。
 */
import (
	"fmt"
	_ "strconv"
)

func main() {
	result := generate(5)
	fmt.Println(result)

}

func generate(numRows int) [][]int {
	var result [][]int
	for i:=0;i<numRows;i++{
		var item []int
		for j:=0;j<=i;j++{
			if j==0 {
				item = append(item,1)
			}else{
				if j == i {
					item = append(item,1)
				}else{
					pre := i - 1
					prej := j-1
					temp := result[pre][j] + result[pre][prej]
					item = append(item,temp)
				}
			}

		}
		result = append(result,item)
	}
	return result
}
