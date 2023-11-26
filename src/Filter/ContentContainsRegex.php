<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

final class ContentContainsRegex implements ContextFilterInterface
{
    public function __construct(private readonly string $pattern)
    {
    }

    public function __invoke(): bool
    {
        $post = get_post();

        if (!($post instanceof \WP_Post)) {
            return false;
        }

        return (bool)\Safe\preg_match($this->pattern, $post->post_content);
    }
}
