package main

import (
	"fmt"
	"strconv"
)

func main() {
	i := 1.25611
	fmt.Printf("%.1e \n", i)  //四舍五入

	j := 65
	jj := string(j)
	fmt.Println(jj)

	jjj := strconv.Itoa(j)
	fmt.Println(jjj)

}
