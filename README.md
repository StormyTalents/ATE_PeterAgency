### Requirements

- Docker
- MySQL Server

### Setup

1. Copy `.env.example` and name the new file `.env`
2. Fill in your database details in the newly created `.env` file
3. Run `docker-compose build` in the project directory
4. Run `docker-compose up` when the build process has finished
5. Open a CLI window for the PHP image in Docker via the Docker GUI
6. Navigate to `/var/www` in the CLI and run command `composer install`
   
   - If any composer errors occurs during installation, run `composer update` and then `composer install` again
7. Import the `db.sql` file to your database 
8. Visit `localhost:8080` in your web browser to access the site

    - The website will be a bit slow in development mode as nothing is cached

### Deploying to production

1. Change the `APP_ENV` variable in the `.env` file to `production`
2. Change the `APP_DEBUG` variable in the `.env` file to `false`