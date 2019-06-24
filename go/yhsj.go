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
//解法一
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
//解法二
func generate2(numRows int) [][]int{
	var result [][]int
	for i:=0;i<numRows;i++{
		result = append(result,getRow(i))
	}
	return result
}
func getRow(rowIndex int) []int {
	if rowIndex == 0 {
		return []int{1}
	}
	if rowIndex == 1{
		return []int{1,1}
	}
	temp := getRow(rowIndex-1)
	lenTemp := len(temp)
	res := make([]int,lenTemp+1)
	res[0] = 1
	res[lenTemp]=1
	for i := 0; i < lenTemp-1;i++{
		res[i+1] = temp[i]+temp[i+1]
	}
	return res
}
