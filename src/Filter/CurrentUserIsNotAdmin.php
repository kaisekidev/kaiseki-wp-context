<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

class CurrentUserIsNotAdmin implements ContextFilterInterface
{
    public function __invoke(): bool
    {
        return CurrentUserCan::check('manage_options') === false;
    }
}
