<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

use WP_Post;

interface ContextFilterInterface
{
    public function __invoke(?WP_Post $post = null): bool;
}
