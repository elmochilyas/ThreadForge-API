# Submission Checklist — ThreadForge API

Use this checklist to verify all requirements are met before project submission.

## Documentation

- [x] README.md updated with project info, features, tech stack, API routes, local setup, testing, CI/CD, deployment, security/queue notes
- [x] docs/DEPLOYMENT.md — Azure VM deployment summary
- [x] docs/SCREENSHOTS.md — screenshot instructions
- [x] docs/SUBMISSION_CHECKLIST.md — this file

## Testing

- [x] Pest tests present (Feature tests: Auth, CampaignBlueprint, ContentRepurpose, GeneratedPost, GhostwriterChat, ProcessRawContentJob)
- [x] `php artisan test` passes locally
- [x] Screenshot: tests passing (place in docs/tests-local.png)

## CI/CD

- [x] GitHub Actions workflow present (`.github/workflows/ci.yml`)
- [x] Runs `php artisan test` on push and pull request
- [x] Screenshot: CI green (place in docs/ci-green.png)

## Production Deployment (Azure VM)

- [x] Ubuntu 24.04, PHP 8.4, Composer, MySQL, Nginx installed
- [x] Application deployed at `/var/www/threadforge-api`
- [x] Nginx configured to serve `/var/www/threadforge-api/public`
- [x] Database `threadforge` created, migrations executed (`php artisan migrate --force`)
- [x] Public API responding at [http://104.214.178.76](http://104.214.178.76)
- [x] Protected route returns `401 Unauthorized` without token
- [x] Screenshot: Azure VM proof (place in docs/azure-vm.png)
- [x] Screenshot: API test result (place in docs/api-test-401.png)
- [x] Screenshot: migration/database tables (place in docs/db-tables.png)

## Queue Worker

- [ ] `QUEUE_CONNECTION=database` configured in `.env`
- [x] Database `jobs` table created by migration
- [ ] Supervisor or equivalent configured to monitor `php artisan queue:work` in production
- [ ] Screenshot or confirmation of queue worker running (if available)

> **Note:** The queue driver is set to `database` and the migrations include the `jobs` table.  
> In production, a process monitor (e.g., Supervisor) must keep `php artisan queue:work` running.  
> If the queue worker is not yet supervised, mark the relevant items above as pending.

## Security

- [x] `.env` excluded from version control (`.gitignore`)
- [x] `APP_DEBUG=false` in production
- [ ] Ensure no secrets or keys appear in committed files
