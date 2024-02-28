<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

use WP_Post;

class CurrentUserHasNotEmail extends CurrentUserHasEmail implements ContextFilterInterface
{
    public function __invoke(?WP_Post $post = null): bool
    {
        return self::check($this->email) === false;
    }
}
