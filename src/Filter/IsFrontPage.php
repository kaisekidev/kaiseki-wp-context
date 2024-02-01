<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

use function is_numeric;

class IsFrontPage implements ContextFilterInterface
{
    public function __invoke(?\WP_Post $post = null): bool
    {
        if ($post === null) {
            return is_front_page();
        }

        $option = get_option('page_on_front');

        if (!is_numeric($option)) {
            return false;
        }

        return $post->ID === (int)$option;
    }
}
