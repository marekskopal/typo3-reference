# Changelog

All notable changes to this project are documented here. The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
- `CLAUDE.md` with architecture and tooling guidance for Claude Code.
- `.gitattributes` and GitHub Actions CI workflow (`.github/workflows/ci.yml`) running PHPStan on PHP 8.2 and 8.4 and PHPCS on PHP 8.2.

### Fixed
- PHPCS violations surfaced after enabling CI.
- Homepage link in `composer.json`.

## [1.1.0] — 2025-09-23

### Added
- Contact fields on `Reference` and `Client` records.

### Fixed
- Backend labels (`locallang_db.xlf`) and code style.

## [1.0.0] — 2025-09-22

Initial release.

### Added
- TYPO3 v13.4 extension `ms_reference` providing two Extbase plugins (`Reference`, `Client`) with `list` / `show` actions.
- Domain models `Reference`, `Client`, `Category`, `Param`, `ParamValue` with Extbase repositories and TCA configuration.
- FlexForm-driven plugin settings for both Reference and Client content elements.
- Site Set (`Configuration/Sets/MsReference`) wiring TypoScript template/partial/layout paths and `storagePid`.
- Custom `ActionController` that overlays Fluid template paths from `settings.templateLayouts`, paired with an `ItemsProcFunc` hook that populates the layout dropdown from `$GLOBALS['TYPO3_CONF_VARS']` and page TSConfig (`tx_msreference.templateLayouts.`).
- `HasCategoryViewHelper` condition ViewHelper.
- Google Maps integration (via `clickstorm/go-maps-ext`).
- Czech and English backend translations.
- Tooling: PHPStan at `level: max` with bleedingEdge + shipmonk rules; PHPCS using the shared `ruleset.xml` (PSR-12 + Slevomat).

[Unreleased]: https://github.com/marekskopal/typo3-reference/compare/v1.1.0...HEAD
[1.1.0]: https://github.com/marekskopal/typo3-reference/compare/v1.0.0...v1.1.0
[1.0.0]: https://github.com/marekskopal/typo3-reference/releases/tag/v1.0.0
