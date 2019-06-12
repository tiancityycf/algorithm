# 排序算法对比

![](/images/Algorithm/sort.png)


辅助记忆
时间复杂度记忆- 
冒泡、选择、直接 排序需要两个for循环，每次只关注一个元素，平均时间复杂度为O（n2）O（n2）（一遍找元素O(n)O(n)，一遍找位置O(n)O(n)）
快速、归并、希尔、堆基于二分思想，log以2为底，平均时间复杂度为O(nlogn)O(nlogn)（一遍找元素O(n)O(n)，一遍找位置O(logn)O(logn)）

稳定性记忆-“快希选堆”（快牺牲稳定性） 
排序算法的稳定性：排序前后相同元素的相对位置不变，则称排序算法是稳定的；否则排序算法是不稳定的。

# 稳定性的意义
1. 如果只是简单的进行数字的排序，那么稳定性将毫无意义。
2. 如果排序的内容仅仅是一个复杂对象的某一个数字属性，那么稳定性依旧将毫无意义
3. 如果要排序的内容是一个复杂对象的多个数字属性，但是其原本的初始顺序毫无意义，那么稳定性依旧将毫无意义。
4. 除非要排序的内容是一个复杂对象的多个数字属性，且其原本的初始顺序存在意义，那么我们需要在二次排序的基础上保持原有排序的意义，才需要使用到稳定性的算法，例如要排序的内容是一组原本按照价格高低排序的对象，如今需要按照销量高低排序，使用稳定性算法，可以使得想同销量的对象依旧保持着价格高低的排序展现，只有销量不同的才会重新排序。（当然，如果需求不需要保持初始的排序意义，那么使用稳定性算法依旧将毫无意义）。

# 基数排序 vs 计数排序 vs 桶排序
这三种排序算法都利用了桶的概念，但对桶的使用方法上有明显差异：
1. 基数排序：根据键值的每位数字来分配桶
2. 计数排序：每个桶只存储单一键值
3. 桶排序：每个桶存储一定范围的数值