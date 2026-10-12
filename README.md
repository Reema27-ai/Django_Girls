# Django Girls — Karimatu Jalloh
BBIT, Semester 5, Web Programming assignment. Academic demonstration; not an official Django Girls event service.

## Run in XAMPP
1. Copy this django-girls folder into C:\xampp\htdocs.
2. In XAMPP php.ini enable extension=pdo_sqlite and extension=sqlite3. Restart Apache.
3. Start Apache and open http://localhost/django-girls/ .
4. Create an account, log out, log in again, and verify the dashboard shows your actual registered details.

The SQLite database is created automatically in storage. Apache denies direct access to that folder using .htaccess. Keep AllowOverride enabled; do not serve this folder with PHP's built-in server without separately protecting storage. Production deployments should put database storage outside the document root. No PostgreSQL/MySQL configuration is required for this standalone edition.

## Pages
index.php: Home; signup.php: registration; login.php: authentication; dashboard.php: protected personal page; logout.php: POST-only logout.

## Security
PHP password_hash / password_verify, prepared SQL statements, escaped output, CSRF tokens, session ID regeneration, HttpOnly/SameSite cookies and session-based login throttling. The simple throttling is suitable for a class project; production needs persistent server-side rate limiting. HTTPS is required for production.

## Design and interactions
Cream, muted green and burnt orange; responsive layouts; accessible navigation, path filters, FAQ disclosures, password reveal, and local learning notes. No theme/plugin dependencies. The code illustration and brand badge are custom typographic artwork inspired by Django Girls, not an official downloaded logo. Replace the badge with an official logo supplied by your lecturer if required.

## Before submission
Replace [Add student ID] in includes/footer.php. Footer year: 2026. Capture the home page and prepare the brief's 4–5 page printed documentation in Tahoma 12, explaining your design choices. Complete and sign your assessment form. Understand and adapt the source before submission.

## Test checklist
Check valid registration, duplicate emails, mismatched passwords, wrong credentials, direct dashboard access while logged out, successful login, POST logout and inaccessible storage/members.sqlite. Test navigation, filters, FAQs and mobile layout. This package was statically checked; PHP runtime testing must be completed in XAMPP.

## Second edition design
Electric violet, cyan, dark plum and lilac replace the first edition. A full-width learning studio hero, tilted dashboard illustration, rounded pathway cards and sidebar dashboard create a new visual direction. Dashboard tabs, a persistent four-task checklist, progress ring, theme switch, display-name preference, expandable learning steps and downloadable notebook are browser-local interactions. They are practice tools, not a real course platform.
