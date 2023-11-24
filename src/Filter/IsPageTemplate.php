<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

use function in_array;

final class IsPageTemplate implements ContextFilterInterface
{
    /** @var array<string> */
    private array $pageTemplates;

    public function __construct(string ...$pageTemplates)
    {
        $this->pageTemplates = $pageTemplates;
    }

    public function __invoke(): bool
    {
        if (!is_page()) {
            return false;
        }

        return in_array(get_page_template_slug(), $this->pageTemplates, true);
    }
}
