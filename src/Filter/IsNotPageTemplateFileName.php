<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

class IsNotPageTemplateFileName extends IsPageTemplateFileName implements ContextFilterInterface
{
    public function __invoke(): bool
    {
        return self::check(...$this->fileNames) === false;
    }
}
