# CovidVaccineRegistrationSampleProject

This is a sample project for covid vaccine registration with Laravel 10, Vue.js 3, Vite.

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
git clone https://github.com/subhesadek/covid_vaccine_registration.git
```

2. Navigate to the project directory:

```python
cd covid_vaccine_registration
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

7: Run the database migrations:

```python
sail artisan migrate
```

8: Generate the application key:

```python
sail artisan key:generate
```

9: Install & setup NPM

```python
sail npm install && sail npm run dev
```

## Laravel Queue and SMTP Server Setup

1. Start the Laravel Queue worker:

```python
sail artisan queue:work
```

<b> Note: </b> I used database for Queue Connection.

2. Setup your SMTP email server:

![Alt Text](https://github.com/SubheSadek/repo_images/blob/main/smtp_mail_setup.png)

<b> Note: </b> Used queue for sending an Invitation mail before last night at 9pm from scheduled date.

## Laravel Task Scheduling (Cron Job) setup

1. Start the Laravel Task Scheduler:

```python
sail artisan run:schedule
```

<b> Note: </b> Task Scheduler will update registration status when the scheduled_date exceeded.

## SMS notification

If an additional requirement of sending SMS notifications is given in the future, the following changes need to be made in the code:

1. Have to add a new function to send SMS notifications, or modify the existing function to include SMS notifications.

2. Make update the code that sends notifications to call the SMS function in addition to the email function.

3. Will update any relevant variables or constants to include information about the SMS notification, such as the API key for the SMS service.

4. And finally have to update the README file to reflect the new requirement and describe the changes made to the code.

It is recommended to follow the best practices of modular programming and keep the code organized and well-commented, so that it is easy to understand and modify in the future.

## PHP Unit Test Case

This repository contains a set of unit tests for a PHP application

1. To run the tests, simply execute the following command from the root directory of the repository:

```python
sail artisan test
```

## Manual Installation

To install this project, follow these steps:

1. Clone the repository to your local machine:

```python
git clone https://github.com/subhesadek/covid_vaccine_registration.git
```

2. Navigate to the project directory:

```python
cd covid_vaccine_registration
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

You should now be able to access the application at [http://localhost:8000](http://localhost:8000).

## Usage

To use the Covid vaccine registration site, follow these steps:

1. Visit the website at [http://localhost](http://localhost)
2. Click on the "Haven't register yet ? Please register." link to create an account and provide your National ID (NID) number, name, age, and contact information.
3. Once registered, you will receive notifications about the vaccine availability and registration status updates via email.
4. If you want to check your current registration status, visit the website home page and and enter your NID number and the website will display your current registration status.

Note: This website is for informational purposes only and does not provide medical advice. Please consult with your healthcare provider for any medical advice regarding COVID-19.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more information.
