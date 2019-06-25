package main

/**
 * 125 验证回文串
 * 给定一个字符串，验证它是否是回文串，只考虑字母和数字字符，可以忽略字母的大小写。
 * 说明：本题中，我们将空字符串定义为有效的回文串。
 * 示例 1:
 * 输入: "A man, a plan, a canal: Panama"
 * 输出: true
 * 示例 2:
 * 输入: "race a car"
 * 输出: false
 */
import (
	"fmt"
	"strings"
	"unicode"
)

func main() {
	var str = "A ;    man, a plan,   a canal: Panama"
	//var str = " "
	result := isPalindrome2(str)
	fmt.Println(result)
}

//解法一
func isPalindrome(s string) bool {
	s = strings.ToLower(s)
	var byt = []rune(s)
	fmt.Println(byt)
	var length = len(byt)
	var kk = length - 1
	for k, v := range byt {
		if kk < k {
			return true
		}
		if isValid(v) {
			for !isValid(byt[kk]) {
				kk--
				if kk < k {
					return false
				}
			}
			fmt.Println(k, kk)
			if v != byt[kk] {
				return false;
			} else {
				kk--
			}
		} else {
			continue
		}
	}
	return true
}
func isValid(v rune) bool {
	if (v > 47 && v < 58) || (v > 64 && v < 91) || (v > 96 && v < 123) {
		return true
	} else {
		return false
	}
}

//解法二
func isPalindrome2(s string) bool {
	a := strings.FieldsFunc(strings.ToLower(s), func(c rune) bool {
		//fmt.Println(c)
		return !unicode.IsLetter(c) && !unicode.IsNumber(c)
	})
	fmt.Printf("%T %+v \n", a, a)
	s2 := strings.Join(a, "")
	fmt.Printf("%T 值： %s \n", s2, s2)

	for i := range s2 {
		if s2[i] != s2[len(s2)-1-i] {
			return false
		}
	}
	return true
}
