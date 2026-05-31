# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

## 1.0.0 - 2026-05-31

First tagged release.

### Added

- `ContextFilterInterface` (`__invoke(?WP_Post): bool`) and `ContextFilterPipeline` for composing
  WordPress context checks.
- Built-in filters for post type (`IsPostType`), front page (`IsFrontPage`), page templates
  (`IsPageTemplate`, `IsPageTemplateFileName`), authentication (`IsUserLoggedIn`), the current user
  (`CurrentUserCan`, `CurrentUserHasRole`, `CurrentUserHasEmail`, `CurrentUserIsAdmin`), and post
  content (`ContentContainsBlock`, `ContentContainsRegex`) — each with its negation.

### Changed

- PHP requirement is `^8.2` (PHP 8.4 is the primary target).
- Adopted the org baseline: `kaiseki/php-coding-standard: ^1.0` with the shared PHPStan config
  (`level: max`), PHPStan 2, composer-require-checker 4; CI runs via the reusable workflow in
  `kaisekidev/.github`. Static-analysis only — no test suite yet (`run-tests: false`).
- `ContentContainsBlock` now narrows the regex matches at runtime (`is_array`/`is_string`) to
  satisfy PHPStan 2 at `level: max`; behavior is unchanged.
