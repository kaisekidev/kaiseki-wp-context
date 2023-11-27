<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

class CurrentUserIsAdmin extends CurrentUserCan implements ContextFilterInterface
{
    public function __invoke(): bool
    {
        return self::check('manage_options');
    }
}
