<?php

declare(strict_types=1);

namespace Phpsol\Generic\Type;

final class TArray implements Type
{
    public function toString() : string
    {
        return 'array';
    }

    public function parent() : ?Type
    {
        return new TMixed();
    }
}
