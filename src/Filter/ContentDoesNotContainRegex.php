<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

class ContentDoesNotContainRegex extends ContentContainsRegex implements ContextFilterInterface
{
    public function __invoke(): bool
    {
        return self::check($this->pattern) === false;
    }
}
