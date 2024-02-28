<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

use WP_Post;

class IsNotPostType extends IsPostType implements ContextFilterInterface
{
    public function __invoke(?WP_Post $post = null): bool
    {
        return self::check($this->postType, $post) === false;
    }
}
