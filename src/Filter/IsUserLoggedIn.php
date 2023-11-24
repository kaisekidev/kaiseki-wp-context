<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

final class IsUserLoggedIn implements ContextFilterInterface
{
    public function __invoke(): bool
    {
        return is_user_logged_in();
    }
}
