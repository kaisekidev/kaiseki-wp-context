<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

use WP_Post;

use function is_user_logged_in;

class IsUserLoggedIn implements ContextFilterInterface
{
    public function __invoke(?WP_Post $post = null): bool
    {
        return self::check();
    }

    public static function check(): bool
    {
        return is_user_logged_in();
    }
}
