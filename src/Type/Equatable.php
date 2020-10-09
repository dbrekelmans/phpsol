<?php

declare(strict_types=1);

namespace Phpsol\Type;

interface Equatable
{
    public function equals(Type $type) : bool;
}