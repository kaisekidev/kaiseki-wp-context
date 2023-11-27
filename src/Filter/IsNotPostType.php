<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

class IsNotPostType extends IsPostType implements ContextFilterInterface
{
    public function __invoke(): bool
    {
        return self::check(...$this->postTypes) === false;
    }
}
