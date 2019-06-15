<?php
/*
*	适配器模式：将目标接口，转化为客户期望的接口。
*
*	在我们的示例中，目标接口是MonkeyInterface，
*	但是客户(Test类的run方法)期望的是PersonInterface，即客户期望处理的是Person。
*	我们的处理方式是在客户和目标接口中间加一个适配器(MonkeyAdapter)，客户使用的是适配器实例，适配器
*   实例最终会将相应请求委托给它持有的目标对象来处理(MonkeyAdapter中的$monkey属性)
*
*   什么时候会用到适配器模式？
*   其实最简单的例子是当我们引用一个第三方类库。这个类库随着版本的改变，它提供的API也可能会改变。
*   如果很不幸的是，你的应用里引用的某个API已经发生改变的时候，除了在心中默默地骂“wocao”之外，你还得去硬着头皮去改大量的代码。
*   难道真的一定要如此吗？按照套路来说，我会回答“不是的”。我们有适配器模式啊~~
*   当接口发生改变时，适配器模式就派上了用场。
*/
interface MonkeyInterface
{
	public function jump();
	public function roar();//吼叫
}
interface PersonInterface
{
	public function walk();
	public function speak();
}
class LittleMonkey implements MonkeyInterface
{
	public function jump()
	{
		echo "jump jump<br>\n";
	}
	public function roar()
	{
		echo "ohoooooo..<br>\n";
	}
}
class LittleBoy implements PersonInterface
{
	public function walk()
	{
		echo "I am walking<br>\n";
	}
	public function speak()
	{
		echo "I am speaking<br>\n";
	}
}
class MonkeyAdapter implements PersonInterface
{
	private $monkey;
	public function __construct(MonkeyInterface $monkey)
	{
		$this->monkey = $monkey;
	}
	public function walk()
	{
		$this->monkey->jump();
	}
	public function speak()
	{
		$this->monkey->roar();
	}
}
class Test
{
	public function run()
	{
		$person = new LittleBoy();
		$person->walk();
		$person->speak();
		$monkey = new LittleMonkey();
		$monkeyAdapter = new MonkeyAdapter($monkey);
		$monkeyAdapter->walk();
		$monkeyAdapter->speak();
	}
}
$test = new Test();
$test->run();

/**
 *   应用场景：老代码接口不适应新的接口需求，或者代码很多很乱不便于继续修改，或者使用第三方类库。例如：php连接数据库的方法：mysql,,mysqli,pdo,可以用适配器统一
 */

 //老的代码    

 class User {   

     private $name;   

     function __construct($name) {   

         $this->name = $name;   

     }   

     public function getName() {   

         return $this->name;   

     }   

 }   
 //新代码，开放平台标准接口   

 interface UserInterface {   

     function getUserName();   

 }   

 class UserInfo implements UserInterface {   

     protected $user;   

     function __construct($user) {   

         $this->user = $user;   

     }   

     public function getUserName() {   

         return $this->user->getName();   

     }   

 }   
 $olduser = new User('张三');   

 echo $olduser->getName();   

 $newuser = new UserInfo($olduser);   

 echo $newuser->getUserName(); 