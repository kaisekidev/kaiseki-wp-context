<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

class ContentDoesNotContainRegex extends ContentContainsRegex implements ContextFilterInterface
{
    public function __invoke(?\WP_Post $post = null): bool
    {
        return self::check($this->pattern, $post) === false;
    }
}
