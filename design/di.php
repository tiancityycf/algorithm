<?php
/*
 * 后期静态绑定
 * 真实的dependency injection container会提供更多的特性，如
 * 1.自动绑定（Autowiring）或 自动解析（Automatic Resolution）
 * 2.注释解析器（Annotations）
 * 3.延迟注入（Lazy injection）
 */
class C
{
    public function doSomething()
    {
        echo __METHOD__, '我是C类|';
    }
}

class B
{
    private $c;

    public function __construct(C $c)
    {
        $this->c = $c;
    }

    public function doSomething()
    {
        $this->c->doSomething();
        echo __METHOD__, '我是B类|';
    }
}
class A
{
    private $b;

    public function __construct(B $b)
    {
        $this->b = $b;
    }

    public function doSomething()
    {
        $this->b->doSomething();
        echo __METHOD__, '我是A类|';;
    }
}
class IoC
{
    protected static $registry = [];

    public static function bind($name, Callable $resolver)
    {
        static::$registry[$name] = $resolver;
    }

    public static function make($name)
    {
        if (isset(static::$registry[$name])) {
            $resolver = static::$registry[$name];
            return $resolver();
        }
        throw new Exception('Alias does not exist in the IoC registry.');
    }
}

IoC::bind('c', function () {
    return new C();
});
IoC::bind('b', function () {
    return new B(IoC::make('c'));
});
IoC::bind('a', function () {
    return new A(IoC::make('b'));
});


// 从容器中取得A
$foo = IoC::make('a');
$foo->doSomething(); // C::doSomething我是C类|B::doSomething我是B类|A::doSomething我是A类|