# Wakoen migration report

Date: 2026-09-08

## Scope

- Source copy: `wakoen.3d-showcase.net`
- Test environment: `https://wakoen.wiz-services.com/`
- Production: `https://wakoen.ed.jp/`
- This change has not been deployed to production.
- Database, uploads, credentials, runtime logs, and caches are stored outside Git.

## Backups

### Source

- Files: `work/wakoen-migration/backups/source/source-site.zip`
- Files SHA-256: `3cf0ed6b5359a1a16cd5d470969bd100d7510dd21352bfb021a32e528d3abe47`
- Database: `work/wakoen-migration/backups/source/database.sql.gz`
- Database SHA-256: `410333553463597b77cc4720704bd90a76e0d71cb3bf2176cf370b8e4e3d6fab`

### Production baseline

- Files: `work/wakoen-migration/backups/production/production-cms.zip`
- Files SHA-256: `b53048aebebb9df0d06d7c23028f42c0419f4c82566bf0e888c5187d830813dd`
- Database: `work/wakoen-migration/backups/production/database.sql.gz`
- Database SHA-256: `4bb0606b887ef372ca0e311aef9a772d595cab331446bc38aa70f476d9d74040`

The production source baseline is commit `70dc7ba` on `main`.

## Versions

| Component | Source before | Test after | State |
| --- | --- | --- | --- |
| PHP | 7.0.32 | 7.4.33 | Matched production |
| WordPress | 5.2.21 | 7.1 | Updated |
| Database schema | Legacy | 61833 | Updated |
| Theme | Marlin lite 1.0.6 | Marlin lite 1.0.6 | Preserved |
| Advanced Custom Fields | 5.8.3 | 6.8.9 | Active |
| Breadcrumb NavXT | 6.1.0 | 7.5.2 | Active |
| Classic Editor | 1.5 | 1.7.0 | Active |
| Contact Form 7 | 5.1.9 | 6.1.7 | Active |
| Conditional Fields for CF7 | 1.6.5 | 2.7.13 | Active |
| Custom Field Suite | 2.6.2.1 | 2.6.8-wiz.2 | Active, compatibility patch retained |
| Flamingo | 1.9 | 2.6.4 | Active |
| Limit Login Attempts | 1.7.1 | Limit Login Attempts Reloaded 3.3.7 | Replaced with maintained successor |
| Post Expirator | 2.4.0.1 | PublishPress Future 4.10.5 | Active successor version |
| WP Mail SMTP | 3.2.1 | 4.9.0 | Active |

Inactive plugins retained and updated: Akismet 5.7.2, All-in-One WP Migration 7.110,
All in One SEO 5.0.1.1, SiteGuard 1.8.9, Webheadcoder Multi-Step Forms for CF7 4.7,
WPForms Lite 2.0.1.1, and WP Multibyte Patch 2.9.3.

## Compatibility and security work

- Preserved Custom Field Suite and installed the maintained PHP compatibility/security patch.
- Preserved all three CFS field groups; no custom-field migration was performed.
- Removed the legacy Limit Login Attempts plugin after installing its maintained successor.
- Removed the inactive and closed What's New Generator plugin.
- Removed Hello Dolly, obsolete inactive themes, the old All-in-One WP Migration extension,
  and publicly accessible PHP backup files from the active theme.
- Installed Twenty Twenty-Five 1.5 as an inactive fallback theme.
- Confirmed `wp-admin` and `wp-includes` match the official WordPress 7.1 package.
- Updated `wp-config-sample.php` to the official WordPress 7.1 version.
- Kept the active theme at 1.0.6 and made no visual template change.

The test environment is behind a proxy that reports the origin request as HTTP. Its excluded,
environment-specific `wp-config.php` therefore contains this HTTPS detection before WordPress loads:

```php
if (
    (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false)
    || (isset($_SERVER['HTTP_X_FORWARDED_HOST']) && $_SERVER['HTTP_X_FORWARDED_HOST'] === 'wakoen.wiz-services.com')
) {
    $_SERVER['HTTPS'] = 'on';
}
```

## Mail and forms

- Switched the test environment from the migrated, unauthenticated SMTP credentials to the
  hosting server's PHP Mail transport.
- Kept the site From address and name as `info@wakoen.ed.jp` and the existing organization name.
- Enabled customer auto-reply for forms 397 (visit) and 391 (recruitment).
- Form 242 (contact) already had both administrator notification and customer auto-reply enabled.
- A non-form WordPress transport probe was accepted by `wp_mail()` with no reported error.
- A real form submission was not generated during this work.

## QA completed

- Public pages: home, contact, visit, recruitment, lesson, and Sankara returned HTTP 200.
- Login, dashboard, plugins, Site Health, updates, and WP Mail SMTP admin pages returned HTTP 200.
- REST API returned HTTP 200.
- WordPress.org version endpoint returned HTTP 200.
- Loopback and WP-Cron returned HTTP 200.
- Database schema version matched WordPress 7.1 (`61833`).
- PHP 7.4.33 was detected on the test environment.
- No visible Fatal, Warning, Deprecated, Notice, or Parse errors were found on the checked pages.
- Final `wp-content/debug.log` size was zero bytes.
- No temporary migration PHP scripts, SQL dumps, or archives remained in the public root.

## Remaining verification

- Confirm receipt of the WordPress transport test email in the recipient mailbox.
- Submit each of the three forms with a controlled test address and confirm both administrator
  notification and customer auto-reply delivery.
- Perform final desktop and mobile visual comparison in Chrome. Chrome control was unavailable
  during the automated QA pass, so visual sign-off remains a manual approval item.

## Production deployment outline

1. Obtain explicit approval for the test environment.
2. Take fresh production file and database backups and record SHA-256 hashes.
3. Confirm the production PHP version remains 7.4.33.
4. Merge the approved `test` changes into `main` and tag the pre-deploy commit.
5. Deploy code only after confirming environment-specific `wp-config.php`, uploads, and URLs are excluded.
6. Run the WordPress database upgrade, then apply the approved plugin activation and mail settings.
7. Clear caches and verify public pages, admin pages, REST, loopback, WP-Cron, and logs.
8. Do not perform a production form submission unless separately authorized.

## Rollback outline

1. Restore the production file archive and database dump captured immediately before deployment.
2. Restore the pre-deploy `main` tag if a Git rollback is required.
3. Restore the production `wp-config.php` unchanged.
4. Clear caches and recheck the public site, admin login, cron, and error logs.
