<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

class CurrentUserHasEmail implements ContextFilterInterface
{
    public function __construct(protected readonly string $email)
    {
    }

    public function __invoke(?\WP_Post $post = null): bool
    {
        return self::check($this->email);
    }

    public static function check(string $email): bool
    {
        if (!is_user_logged_in()) {
            return false;
        }
        return $email === wp_get_current_user()->user_email;
    }
}
