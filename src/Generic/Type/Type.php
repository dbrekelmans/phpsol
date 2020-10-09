<?php

declare(strict_types=1);

namespace Phpsol\Generic\Type;

interface Type
{
    public function toString() : string;

    public function parent() : ?Type;
}
