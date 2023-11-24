<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

use function in_array;

final class IsPostType implements ContextFilterInterface
{
    /** @var array<string> */
    private array $postTypes;

    public function __construct(string ...$postTypes)
    {
        $this->postTypes = $postTypes;
    }

    public function __invoke(): bool
    {
        $post = get_post();

        if ($post === null) {
            return false;
        }

        return in_array($post->post_type, $this->postTypes, true);
    }
}
