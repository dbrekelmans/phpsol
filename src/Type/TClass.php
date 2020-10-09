<?php

declare(strict_types=1);

namespace Phpsol\Type;

use InvalidArgumentException;

use function class_exists;
use function interface_exists;
use function sprintf;

final class TClass implements Type, Equatable
{
    /**
     * @psalm-var class-string
     */
    private string $class;

    /**
     * @psalm-param class-string $class
     */
    public function __construct(string $class)
    {
        if (!class_exists($class) && !interface_exists($class)) {
            throw new InvalidArgumentException(sprintf('Expected a class-string. Got: %s', $class));
        }

        $this->class = $class;
    }

    public function parent() : ?Type
    {
        return new TObject();
    }

    public function equals(Type $type) : bool
    {
        return $type instanceof self && $this->toString() === $type->toString();
    }

    public function toString() : string
    {
        return $this->class;
    }
}
