<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

use WP_Post;

use function in_array;
use function wp_get_current_user;

class CurrentUserHasRole implements ContextFilterInterface
{
    public function __construct(protected readonly string $role)
    {
    }

    public function __invoke(?WP_Post $post = null): bool
    {
        return self::check($this->role);
    }

    public static function check(string $role): bool
    {
        $user = wp_get_current_user();

        if ($user === null) {
            return false;
        }

        return in_array($role, $user->roles, true);
    }
}
