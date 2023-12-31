<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

class CurrentUserHasNotEmail extends CurrentUserHasEmail implements ContextFilterInterface
{
    public function __invoke(): bool
    {
        return self::check($this->email) === false;
    }
}
