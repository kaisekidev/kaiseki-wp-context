<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

class IsNotPageTemplateFileName extends IsPageTemplateFileName implements ContextFilterInterface
{
    public function __invoke(?\WP_Post $post = null): bool
    {
        return self::check($this->fileName, $post) === false;
    }
}
