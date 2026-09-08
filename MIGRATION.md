# Wakoen WordPress migration

## Branch policy

- `main`: production source baseline and production-ready updates
- `test`: migration and verification work for `wakoen.wiz-services.com`
- Production is not deployed until the test environment is approved.

## Baseline

The initial full baseline was captured from the current production server before any production changes.

- Production URL: `https://wakoen.ed.jp/`
- Production PHP: 7.4.33
- Production WordPress: 4.9.26
- Active theme: `marlin-lite` 1.0.6
- Database and uploads are backed up separately and intentionally excluded from Git.

## Migration rules

- Match the destination PHP version to production before verification.
- Update WordPress and plugins one at a time and verify after each risk-bearing change.
- Keep Custom Field Suite in place and apply minimal compatibility/security patches; do not replace it with another custom-field plugin.
- Preserve the public design and behavior unless a compatibility fix is required.
- Verify REST API, loopback, WP-Cron, forms, admin and customer notifications, and PHP/WordPress logs.
- Remove temporary migration and maintenance scripts immediately after use.

