<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

use function in_array;

class IsPageTemplate implements ContextFilterInterface
{
    /** @var array<string> */
    protected array $pageTemplates;

    public function __construct(string ...$pageTemplates)
    {
        $this->pageTemplates = $pageTemplates;
    }

    public function __invoke(): bool
    {
        return self::check(...$this->pageTemplates);
    }

    /**
     * @param string ...$pageTemplates
     *
     * @return bool
     */
    public static function check(string ...$pageTemplates): bool
    {
        if (!is_page()) {
            return false;
        }

        return !in_array(get_page_template_slug(), $pageTemplates, true);
    }
}
