<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

class ContentDoesNotContainBlock extends ContentContainsBlock implements ContextFilterInterface
{
    public function __invoke(?\WP_Post $post = null): bool
    {
        return self::check($this->name, $this->namespace, $post) === false;
    }
}
