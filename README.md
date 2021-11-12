# ES-CPNV-TeamBuilder

## Installation

Use the package manager [composer](https://getcomposer.org/download/) and [npm](https://www.npmjs.com/).

```bash
git clone https://github.com/Penfu/ES-CPNV-TeamBuilder.git
cd src
composer install
npm install
npm run build
```

## Autologin

The autologed member id is defined in the .env config file.

```php
const USER_ID = 1;
```

## Run locally

```bash
php -S localhost:9000 -t src/public
```

## Add Status to member

The database creation script has been updated to add status.
You have to use the file "teambuilder.sql" which is in the db folder.
It is an additional table, called status, which contains the different possible statuses for a member, and an
additional field in the members table, which links them.

## Unit tests

Run the unit tests from `src\` with the command:

```bash
vendor/bin/phpunit tests/models/
```

To run an individual test, specifiy the test file at the end of the path:

```bash
vendor/bin/phpunit tests/models/TestFile.php
```

## Lib

- [Tailwindcss](https://tailwindcss.com/)

