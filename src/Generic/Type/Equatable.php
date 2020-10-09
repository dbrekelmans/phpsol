<?php

declare(strict_types=1);

namespace Phpsol\Generic\Type;

interface Equatable
{
    public function equals(Type $type) : bool;
}