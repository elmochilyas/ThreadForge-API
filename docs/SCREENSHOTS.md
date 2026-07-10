# Screenshots — ThreadForge API Submission

Place the following screenshots in the `docs/` folder (or attach them directly to your submission platform).

## Required Screenshots

### 1. Local Tests Passing

- **File:** `docs/tests-local.png`
- **Content:** Terminal output of `php artisan test` showing all tests green (passing).
- **How to capture:** Run `php artisan test` locally and screenshot the final summary.

### 2. GitHub Actions Green

- **File:** `docs/ci-green.png`  
- **Content:** GitHub Actions workflow page showing a successful CI run (green checkmark).
- **How to capture:** Navigate to your repository → Actions tab → select the latest workflow run → screenshot the green checkmark and job summary.

### 3. Azure VM / Server Proof

- **File:** `docs/azure-vm.png`  
- **Content:** Azure portal showing the VM running, or an SSH session output showing the server is active (e.g., `php -v`, `nginx -t`).
- **How to capture:** Take a screenshot of the Azure VM overview page or an SSH terminal with server diagnostics.

### 4. Public API Test Result

- **File:** `docs/api-test-401.png`  
- **Content:** Output of `curl -i http://104.214.178.76/api/campaign-blueprints` showing `401 Unauthorized`.
- **How to capture:** Run the curl command from any machine and screenshot the response.

### 5. Migration Success / Database Tables

- **File:** `docs/db-tables.png`  
- **Content:** Output of `php artisan migrate:status` or `SHOW TABLES;` on the production MySQL database.
- **How to capture:** SSH into the VM and run `php artisan migrate:status` or a MySQL `SHOW TABLES` query, then screenshot.

## Notes

- Do **not** fake or Photoshop any screenshots.  
- Use actual terminal or browser output only.  
- If a screenshot is not yet available, mark it as **pending** in the submission checklist.
