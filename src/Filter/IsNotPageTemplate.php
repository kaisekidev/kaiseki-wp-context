<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

class IsNotPageTemplate extends IsPageTemplate implements ContextFilterInterface
{
    public function __invoke(): bool
    {
        return self::check(...$this->pageTemplates) === false;
    }
}
