# TFA4 – Sessions and Authentication

## Setup (Mac / XAMPP)
1. Open the project in VS Code. Run `composer install` if the `vendor` directory is missing.
2. Copy `env` to `.env` if needed and configure `database.default.*` for your MySQL installation. Set `app.baseURL` for your local URL.
3. **Existing TFA3 database:** Back up your database, then run `php spark migrate` followed by `TFA4_INITIAL_PASSWORD='your-long-unique-password' php spark db:seed TFA4PasswordSeeder` to assign a password to all existing users. Avoid putting the password in version control.
4. **Fresh database:** Import `pos_system.sql` into a database named `pos_system` and configure `.env`. The example imported accounts have the temporary password `ChangeMe-TFA4-2026!`. Immediately change it by running the seeder with your own unique password. The exported SQL contains password hashes, not plaintext passwords.
5. Start with `php spark serve` and visit `/login`. Try `admin01` and your seeded password.
6. Do not upload `.env`, production database credentials, or a real password to GitHub. Deploy with HTTPS and production environment settings.

## Test checklist (perform locally; not independently verified)
- Logged out: `/customers`, `/customers/new`, `/users`, `/users/new`, and edit URLs redirect to `/login`.
- Incorrect password shows a generic error; correct password redirects to `/customers`.
- Once logged in, customer/user listing, creation and editing routes are accessible.
- Logout uses POST and a CSRF token; afterward protected URLs redirect to login.
- Newly created users can sign in using their assigned password.

## Security audit
- Never store plaintext passwords: `password_hash()` and `password_verify()` protect stored credentials.
- Never rely on hidden links alone: the `AuthFilter` protects GET and POST routes, and auto-routing is disabled.
- Never reuse a session ID after login: session ID regeneration limits session fixation.
- Never log out via an unprotected GET link: POST with CSRF token prevents cross-site logout requests.
- Change initial shared passwords promptly, add login rate limiting before public deployment, and enforce HTTPS in production.

## Submission
- Push the project and database migration/seeder to your GitHub repository.
- Deploy the app and verify the hosted login and protected routes.
- Add the real GitHub and hosted URLs to your submission. Hosting and live screenshots require running/deploying the app and cannot be claimed from this ZIP alone.
