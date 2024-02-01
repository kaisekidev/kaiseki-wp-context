<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

class IsUserLoggedIn implements ContextFilterInterface
{
    public function __invoke(?\WP_Post $post = null): bool
    {
        return self::check();
    }

    public static function check(): bool
    {
        return is_user_logged_in();
    }
}
