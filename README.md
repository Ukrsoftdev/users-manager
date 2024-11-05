<p align="center"><a href="https://ukrsoftdev.github.io/users-manager/" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Users Manager API
Users Manager API is a RESTFullAPI application with an expressive, elegant solution that usually uses developers when creating RESTFullAPI applications. Users Manager API provides a structure and starting point for creating real project applications, allowing you to see best practices in web development.

## Deploy and installations
The first step is Clone repository from GitHub. Then run from the command line on the root of the repository.

1. Deploy docker `docker compose build`
2. Run docker `docker compose up -d`
3. Create and configure your `.env` file or use `.env.example` file from the working configuration
4. Enter inside the container `docker exec -it php bash`
    1. From the container run `composer install`
    2. From the container run `php artisan migrate --seed`
    3. From the container run `composer test`, to start tests (phpUnit tests and Psalm code review)

## Run app and usage

### Docker container
- Run docker `docker compose up -d`
- Enter inside the container `docker exec -it php bash`
- Remove container `docker compose down`

  More information about Docker Compose you find <a href="https://docs.docker.com/compose/">on the official site</a>.

### Run tests
All commands run inside the docker container `docker exec -it php bash`
- Run all tests `composer test`
- Run only phpUnit `composer test:phpunit`
- Run only Psalm code `composer test:psalm` (code review test regarding settings in `./psalm.xml` file)
- Run a specific phpUnit test `php artisan test --filter=EventDeleteRouteTest` (code review test regarding to settings in `./psalm.xml` file)

### OpenAPI Documentation
*All futures of this system and how to use each API route you can find on the* **[OpenAPIdoc page](https://ukrsoftdev.github.io/users-manager)**. Swagger is deployed separately from the framework and does not have a local link. You can set it up in the `./docs` directory.

By default, you can use Swagger OpenAPIdoc with two server:
- On the GitHub Pages servers (but correctly handling only GET requests) - URL is [OpenAPIdoc page](https://ukrsoftdev.github.io/users-manager)
- After running the Docker container, you can use your local app. (If you use the default config from the `.env.example` file)
