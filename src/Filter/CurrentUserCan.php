<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

use WP_Post;

use function current_user_can;

class CurrentUserCan implements ContextFilterInterface
{
    public function __construct(protected readonly string $capability)
    {
    }

    public function __invoke(?WP_Post $post = null): bool
    {
        return self::check($this->capability, $post);
    }

    public static function check(string $capability, ?WP_Post $post = null): bool
    {
        return $post === null
            ? current_user_can($capability)
            : current_user_can($capability, $post->ID);
    }
}
