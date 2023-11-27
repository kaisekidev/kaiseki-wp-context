<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

final class CurrentUserHasEmail implements ContextFilterInterface
{
    public function __construct(private readonly string $email)
    {
    }

    public function __invoke(): bool
    {
        if (!is_user_logged_in()) {
            return false;
        }
        return $this->email === wp_get_current_user()->user_email;
    }
}
