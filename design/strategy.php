<?php
/**
 * 策略模式
 * 使用场景
 * 假设现在要设计一个购物车系统，一个最简单的情况就是把所有货品的单价乘上数量，但是实际情况肯定比这个复杂。
 * 例如：对普通会员无折扣，对中级会员提供8折优惠，对高级会员提供7折优惠。
 */
interface Strategy
{
  public function calPrice ($price);
}
/**
 * 普通会员策略类
 */
class PrimaryStrategy implements Strategy
{
  public function calPrice ($price)
  {
    echo "普通会员无折扣";
    return $price;
  }
}
/**
 * 中级会员策略类
 */
class MiddleStrategy implements Strategy
{
  public function calPrice ($price)
  {
    echo "中级会员8折优惠";
    return $price * 0.8;
  }
}
/**
 * 高级会员策略类
 */
class HighStrategy implements Strategy
{
  public function calPrice ($price)
  {
    echo "高级会员7折优惠";
    return $price * 0.7;
  }
}
/**
 * 价格实现类
 */
class Price
{
  /**
   * 具体的策略类对象
   */
  private $strategyInstance;
  /**
   * 构造函数，传入一个具体的策略对象
   *
   * @param object $instance
   */
  public function __construct ($instance)
  {
    $this->strategyInstance = $instance;
  }
  /**
   * 计算货品的价格
   *
   * @param double $price
   */
  public function quote ($price)
  {
    return $this->strategyInstance->calPrice($price);
  }
}
/**
 * 客户端操作
 */
$high = new HighStrategy();
$priceClass = new Price($high);
$price = $priceClass->quote(400);
echo $price;