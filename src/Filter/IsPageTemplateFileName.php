<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

use WP_Post;

use function basename;
use function get_page_template_slug;
use function is_page;
use function is_string;

class IsPageTemplateFileName implements ContextFilterInterface
{
    public function __construct(protected readonly string $fileName)
    {
    }

    public function __invoke(?WP_Post $post = null): bool
    {
        return self::check($this->fileName, $post);
    }

    public static function check(string $fileName, ?WP_Post $post = null): bool
    {
        if (
            ($post === null && !is_page())
            || ($post !== null && $post->post_type !== 'page')
        ) {
            return false;
        }

        $templateSlug = get_page_template_slug($post);

        if (!is_string($templateSlug) || $templateSlug === '') {
            return false;
        }

        return basename($templateSlug, '.php') === basename($fileName, '.php');
    }
}
