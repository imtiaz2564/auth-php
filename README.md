# Authentication

Standalone extraction: registration, login, logout, password hashing, sessions,
CSRF validation, and a protected account page. No blog features are included.
This application uses its own session cookie (`authentication_session`).

## Run locally

Requires PHP 8.0+ with mysqli/mysqlnd, Composer, and MySQL.

1. From this folder, run `composer install`.
2. Edit `.env` with your database credentials. Supplied values are examples;
   credentials have not been copied from the parent project.
3. Create a MySQL database matching `DB_NAME`, then import `database/schema.sql`
   into it. Alternatively, use the existing blog database and its `registration`
   table to share accounts. No blog table is needed.
4. Run `php -S 127.0.0.1:8001 -t public` from this folder.
5. Open http://127.0.0.1:8001/ and register or sign in.

For nginx, configure a separate site/location serving only this folder's
`public/` directory and execute only `public/index.php`. The parent project's
existing nginx mapping does not automatically expose this application.
Keep `.env`, source files, and vendor outside the served directory.

The account page requires login. Signed-in users opening login or registration
are redirected to their account. Logout uses a CSRF-protected POST form.
