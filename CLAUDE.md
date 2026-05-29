# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

TYPO3 v13.4 extension `ms_reference` (composer `marekskopal/typo3-reference`, namespace `MarekSkopal\MsReference\`) that provides a reference/portfolio plugin. PHP ≥ 8.2 (composer platform pinned to 8.3).

## Common commands

```sh
composer install                # install deps (CI passes --no-progress)
vendor/bin/phpstan analyse      # static analysis (level: max, bleedingEdge, shipmonk rules)
vendor/bin/phpcs                # lint Classes/ and Configuration/TCA/ against ruleset.xml
vendor/bin/phpunit              # phpunit is in require-dev but no tests exist yet
```

CI (`.github/workflows/ci.yml`) runs PHPStan on PHP 8.2 + 8.4 and PHPCS on PHP 8.2. Before installing, CI disables two composer plugins (`typo3/cms-composer-installers`, `typo3/class-alias-loader`) — replicate this if you hit plugin errors locally.

## Architecture

Two Extbase plugins registered as content elements in `ext_localconf.php`:

- **Reference** → `ReferenceController::list|show`
- **Client** → `ClientController::list|show`

Both extend a custom `Classes/Controller/ActionController.php` that overrides `initializeView()` to support **dynamic template layouts**: setting `settings.templateLayout` picks an entry from `settings.templateLayouts.<key>` (with optional `templateRootPath`, `partialRootPath`, `layoutRootPath`) and appends those paths to the current Fluid `TemplatePaths`. The layout dropdown in FlexForm is populated by `Classes/Hooks/ItemsProcFunc.php::templateLayout()`, which merges two sources:

1. `$GLOBALS['TYPO3_CONF_VARS']['EXT']['ms_reference']['templateLayouts']` (global PHP array)
2. Page TSConfig under `tx_msreference.templateLayouts.` (resolved per `pid`, drilling through `tt_content` when pid is negative)

When adding settings to Reference/Client plugins, update both the FlexForm (`Configuration/FlexForms/Flexform{Reference,Client}.xml`) and the corresponding controller's local `@var array{...} $settings` PHPDoc — controllers re-narrow `$this->settings` from `array<string,mixed>` for PHPStan level max.

### Domain layer

Models in `Classes/Domain/Model/` (`Reference`, `Client`, `Category`, `Param`, `ParamValue`) are standard Extbase entities; relations between `Reference` and `Category`/`Client`/`ParamValue`/`Reference` (similar) are lazy `ObjectStorage`s, initialized in `initializeObject()`. Repositories live in `Classes/Domain/Repository/`. `ReferenceRepository::findReferencesByUids()` bypasses Extbase QueryBuilder with a raw `statement()` call — note that its SQL currently references the table name `tx_odreference_domain_model_reference` (stale, likely a bug carried over from a fork; real tables are `tx_msreference_*` per `ext_tables.sql`).

DI is configured in `Configuration/Services.yaml` — autowire + autoconfigure for everything under `Classes/` except `Classes/Domain/Model/*` (Extbase manages entities).

### Site configuration

Uses TYPO3 v13 **Site Sets** (`Configuration/Sets/MsReference/config.yaml`, `setup.typoscript`, `constants.typoscript`), not classic static templates. The README still describes static-template setup — prefer adding the set to a site's `dependencies` over editing TypoScript records.

## Code style

PHPCS config: project `phpcs.xml` includes the shared `ruleset.xml` (PSR-12 + Slevomat) and only scans `Classes/` and `Configuration/TCA/`. PHPStan runs at `level: max` with `checkImplicitMixed`, `checkBenevolentUnionTypes`, `checkUninitializedProperties`, `reportAnyTypeWideningInVarTag`, etc. — expect to add precise `@var`/`@param` PHPDocs (the controllers already do this for `$this->settings`). `@phpstan-ignore-next-line` is used sparingly for unavoidable framework friction (lazy storage `getUid()`, `$GLOBALS` typing).

## Tables and keys

- Extension key: `ms_reference` (composer extra), DB tables prefixed `tx_msreference_`
- TCA in `Configuration/TCA/`, overrides in `Configuration/TCA/Overrides/`
- MM table: `tx_msreference_reference_category_mm`
- Labels: `Resources/Private/Language/locallang_db.xlf` (+ `cs.locallang_db.xlf`)
