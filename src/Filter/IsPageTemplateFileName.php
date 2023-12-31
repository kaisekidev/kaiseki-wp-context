<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

use function array_map;
use function basename;
use function in_array;
use function is_string;

class IsPageTemplateFileName implements ContextFilterInterface
{
    /** @var array<string> */
    protected array $fileNames;

    public function __construct(string ...$fileNames)
    {
        $this->fileNames = array_map(
            static fn (string $fileName): string => basename($fileName, '.php'),
            $fileNames
        );
    }

    public function __invoke(): bool
    {
        return self::check(...$this->fileNames);
    }

    /**
     * @param string ...$fileNames
     *
     * @return bool
     */
    public static function check(string ...$fileNames): bool
    {
        if (!is_page()) {
            return false;
        }

        $templateSlug = get_page_template_slug();

        if (!is_string($templateSlug) || $templateSlug === '') {
            return false;
        }

        $templateFileName = basename($templateSlug, '.php');

        return in_array($templateFileName, $fileNames, true);
    }
}
