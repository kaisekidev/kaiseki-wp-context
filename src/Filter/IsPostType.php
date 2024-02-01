<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

class IsPostType implements ContextFilterInterface
{
    public function __construct(protected readonly string $postType)
    {
    }

    public function __invoke(?\WP_Post $post = null): bool
    {
        return self::check($this->postType, $post);
    }

    public static function check(string $postType, ?\WP_Post $post = null): bool
    {
        $post = $post ?? get_post();

        if ($post === null) {
            return false;
        }

        return $post->post_type === $postType;
    }
}
