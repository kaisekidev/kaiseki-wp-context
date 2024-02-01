<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

class CurrentUserIsAdmin implements ContextFilterInterface
{
    public function __invoke(?\WP_Post $post = null): bool
    {
        return CurrentUserCan::check('manage_options');
    }
}
