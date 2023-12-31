<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

class IsUserNotLoggedIn extends IsUserLoggedIn implements ContextFilterInterface
{
    public function __invoke(): bool
    {
        return self::check() === false;
    }
}
