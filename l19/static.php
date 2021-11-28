<?php

class StringsHelper
{
    public const ENTITY = 'string';

    private static int $counter = 0;

    public static function camelize(string $string, string $delimiter): string
    {
        var_dump(self::ENTITY);
        self::count();
        return str_replace($delimiter, '', ucwords($string, $delimiter));
    }

    public static function getCount(): int
    {
        return self::$counter;
    }

    private static function count(): void
    {
        self::$counter++;
    }
}

var_dump(
    StringsHelper::camelize('test-message-for-camelize', '-'),
    StringsHelper::camelize('my_other_string', '_'),
    StringsHelper::camelize('mama myla ramy', ' '),
    StringsHelper::getCount(),
    StringsHelper::ENTITY
);

class Student
{
    public const ENTITY = 'people';

    var string $name;

    private static int $counter = 0;

    public function __construct()
    {
        self::$counter++;
    }

    public static function getCount(): int
    {
        return self::$counter;
    }
}

$student = new Student();
$student->name = 'John Dou';

$student1 = new Student();
$student1->name = 'Hanna Lee';

$student2 = new Student();
$student2->name = 'Kelvin Klein';

var_dump(
    $student,
    $student1,
    $student2,
    Student::getCount(),
    Student::ENTITY
);