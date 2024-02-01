<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

class IsNotPostType extends IsPostType implements ContextFilterInterface
{
    public function __invoke(?\WP_Post $post = null): bool
    {
        return self::check($this->postType, $post) === false;
    }
}
