<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

use function in_array;

class IsPostType implements ContextFilterInterface
{
    /** @var array<string> */
    protected array $postTypes;

    public function __construct(string ...$postTypes)
    {
        $this->postTypes = $postTypes;
    }

    public function __invoke(): bool
    {
        return self::check(...$this->postTypes);
    }

    public static function check(string ...$postTypes): bool
    {
        $post = get_post();

        if ($post === null) {
            return false;
        }

        return in_array($post->post_type, $postTypes, true);
    }
}
