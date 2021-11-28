<?php

class People
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function getClass(): string
    {
        return static::class;
    }

    public static function lateStaticBindingTest()
    {
        return 'People Class';
    }

    public static function test()
    {
        var_dump(
            self::lateStaticBindingTest(),
            static::lateStaticBindingTest()
        );
    }
}

class Engineer extends People
{
    public string $speciality;

    public function __construct(string $name, string $speciality)
    {
        parent::__construct($name);
        $this->speciality = $speciality;
    }

    public static function lateStaticBindingTest()
    {
        return 'Engineer Class';
    }
}

class ChefEngineer extends Engineer
{
    public function __construct(string $name, string $speciality)
    {
        parent::__construct($name, $speciality);
    }
}

$e = new Engineer('Test Name', 'Electronics');
var_dump($e, Engineer::getClass(), ChefEngineer::getClass());
//Engineer::test();
ChefEngineer::test();

$ce = new ChefEngineer('Ivan Mihalych', 'QA');
var_dump($ce);