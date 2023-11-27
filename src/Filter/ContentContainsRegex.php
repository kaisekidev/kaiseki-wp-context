<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

class ContentContainsRegex implements ContextFilterInterface
{
    public function __construct(protected readonly string $pattern)
    {
    }

    public function __invoke(): bool
    {
        return self::check($this->pattern);
    }

    public static function check(string $pattern): bool
    {
        $post = get_post();

        if (!($post instanceof \WP_Post)) {
            return false;
        }

        return (bool)\Safe\preg_match($pattern, $post->post_content);
    }
}
