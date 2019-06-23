package main

import (
	"fmt"
	"math"
)

var tmp map[int]int  //存储每行的皇后位置
var result [][]string //存储所有的方案

/**
* 回溯法
 */
func solveNQueens(n int) [][]string {
	tmp = make(map[int]int)   //存储每行的皇后位置
	result = result[0:0]//存储所有的方案
	rowCheck( 0 , n , 0 )
    //fmt.Println("最终结果",result)
	return result
}
func rowCheck(row int, n int,pre int) []string{
	var item []string
	if row>=n{
		return item
	}
	var can = false
	for i := pre; i < n; i++ {
		var ok = true
		for j := 0; j < row; j++ {
			//if row==2 && i==1{
			//	fmt.Println(tmp[j],i,j, math.Abs(float64(tmp[j]-i)),math.Abs(float64(row-j)),"----")
			//}
			if tmp[j]==i || math.Abs(float64(tmp[j]-i))==math.Abs(float64(row-j)){
				ok = false
				break
			}
		}
		if ok {
			tmp[row] = i
			can = true
			break
		}else{
			continue
		}
	}


	if !can{
		//fmt.Println("没得放")
		if row==0{
			return item
		}
		prerow := row - 1
		pre = tmp[prerow] + 1
		delete(tmp,prerow)
		//fmt.Println(prerow,n,pre,tmp)
		//return item
		return rowCheck(prerow, n,pre)
	}
	//if(row>3){
	//	fmt.Println(row,n,pre)
	//	fmt.Println(tmp)
	//	return item
	//}
	//fmt.Println("递归结果",tmp)
	if row == n-1 && can{
		for i := 0; i < n; i++ {
			var hang = ""
			for j := 0; j < n; j++ {
				if tmp[i]==j{
					hang += "Q"
				}else{
					hang += "."
				}
			}
			item = append(item, hang)
		}
		result = append(result,item)

		//fmt.Println("计算下一种方案")
		prerow := row
		pre = tmp[row] + 1
		delete(tmp,prerow)
		//fmt.Println(prerow,n,pre,tmp)
		//return item
		rowCheck(prerow, n , pre )
		return item
	}else{
		return rowCheck( row+1 , n , 0 )
	}
}
func main() {
    n := 1
	result := solveNQueens(n)
	fmt.Println(result)
}
