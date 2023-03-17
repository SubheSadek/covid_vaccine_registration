# CovidVaccineRegistrationTestProject

This is a starter project for a referral website built with Laravel 10, Vue.js 3, Vite, and Laravel Queue.

## Laravel Sail (Docker) Installation

<h3> Prerequisites </h3>

Before we get started, make sure that you have the following prerequisites installed on your local machine:

<ul>
<li>PHP (minimum version: 8.2)</li>
<li>Composer</li>
<li>Docker (minimum version: 20.10)</li>
<li>Git</li>
</ul>

To install this project, follow these steps:

1. Clone the repository to your local machine:

```python
git clone https://github.com/subhesadek/referral_site.git
```

2. Navigate to the project directory:

```python
cd referral_site
```

3. Set up the environment variables by creating a copy of the `.env.example` file and renaming it to `.env`:

```python
cp .env.example .env
```

4: Install Laravel Sail:

```python
composer require laravel/sail --dev
```

This command will download and install Laravel Sail and its dependencies in your project's vendor directory.

Or,

```python
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs

```

<b> Note: </b> If you encounter any issues or have any questions, feel free to check out the official [Laravel Documentation](https://laravel.com/docs/9.x/sail#installing-composer-dependencies-for-existing-projects).

5: Set up Laravel Sail

```python
php artisan sail:install
```

6: Start Laravel Sail

```python
./vendor/bin/sail up
```

7. Generate the application key:

```python
sail artisan key:generate
```

9: Install & setup NPM

```python
sail npm install && sail npm run dev
```

## Manual Installation

To install this project, follow these steps:

1. Clone the repository to your local machine:

```python
git clone https://github.com/subhesadek/referral_site.git
```

2. Navigate to the project directory:

```python
cd referral_site
```

3. Install the project dependencies:

```python
composer install && npm install
```

4. Set up the environment variables by creating a copy of the `.env.example` file and renaming it to `.env`:

```python
cp .env.example .env
```

5. Generate the application key:

```python
php artisan key:generate
```

6. Run the database migrations:

```python
php artisan migrate
```

7. Compile the frontend assets:

```python
npm run dev
```

8. Start the Laravel development server:

```python
php artisan serve
```

9. Start the Laravel Queue worker:

```python
php artisan queue:table
```

```python
php artisan migrate
```

```python
php artisan queue:work
```

10. Setup your SMTP email server:

![Alt Text](https://github.com/SubheSadek/repo_images/blob/main/smtp_mail_setup.png)

You should now be able to access the application at [http://localhost:8000](http://localhost:8000).

## PHP Unit Test Case

This repository contains a set of unit tests for a PHP application

1. To run the tests, simply execute the following command from the root directory of the repository:

```python
php artisan test
```

For laravel sail

```python
sail artisan test
```

or

```python
./vendor/bin/phpunit
```

## Usage

The application has a simple referral system that allows users to share a referral link with their friends. When someone signs up using the referral link, the referrer earns a reward.

To test the referral system, you can create a new user account and share your referral link with another user. When the other user signs up using the referral link, you should see a reward credited to your account.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more information.
