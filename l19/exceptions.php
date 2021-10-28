<?php

class InvalidKeyException extends Exception
{
    protected $message = 'Key is invalid';
}

/**
 * @property string $name
 * @property int $age
 * @property string $sex
 */
class Storage
{
    private array $storage = [];
    private array $allowedFields = [
        'name',
        'age',
        'sex',
    ];

    public function __set(string $key, mixed $value): void
    {
        if (!in_array($key, $this->allowedFields, true)) {
            $rand = random_int(0, 5);
//            throw new BadFunctionCallException();
            if ($rand % 2 === 0) {
                throw new InvalidKeyException();
            } else {
                throw new RuntimeException('Wrong key');
            }
        }
        $this->storage[$key] = $value;
    }

    public function __get(string $key): mixed
    {
        return $this->storage[$key] ?? null;
    }

    public function __isset(string $key): bool
    {
        return array_key_exists($key, $this->storage);
    }
}

$storage = new Storage();
try {
    $storage->name = 'Dmytro';
    $storage->age = 32;
    $storage->sex = 'male';
    $storage->speciality = 'PHP Engineer';
} catch (InvalidKeyException $exception) {
    var_dump($exception);
} catch (RuntimeException $exception) {
    var_dump($exception);
} catch (Exception $exception) {
    var_dump($exception);
} finally {
    var_dump('FInally');
}

var_dump($storage);