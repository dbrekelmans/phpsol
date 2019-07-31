<?php

declare(strict_types=1);

namespace Phpsol\Text;

final class Text
{
    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function toString() : string
    {
        return $this->value;
    }

    public function equals(self $text) : bool
    {
        return $this->toString() === $text->toString();
    }

    public function concatenate(self $text) : self
    {
        return new Text($this->toString() . $text->toString());
    }

    public function contains(self $text) : bool
    {
        $contains = \strpos($this->toString(), $text->toString());

        return \is_int($contains);
    }

    public function length() : int
    {
        return \strlen($this->toString());
    }

    public function replace(Text $target, Text $replacement) : self
    {
        return new Text(\str_replace($target->toString(), $replacement->toString(), $this->toString()));
    }

    /**
     * @return array<self>
     */
    public function split(Text $delimiter) : array
    {
        $parts = \explode($delimiter->toString(), $this->toString());

        if ($parts === false) {
            return [clone $this];
        }

        return \array_map(
            static function ($part) {
                return new Text($part);
            },
            $parts
        );
    }

    public function __toString() : string
    {
        return $this->toString();
    }
}
