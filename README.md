## About :project-name

:project-description

## Overview

- [Requirements](#requirements)
- [Installation](#installation)
- [Deployments](#deployments)
- [Contributing](#contributing)

## Requirements

- PHP (8.1 or newer)
- [Composer](https://getcomposer.org/) (2.1.3 or newer)
- [Laravel 9.x requirements](https://laravel.com/docs/9.x/installation#server-requirements)

## Installation

> 💡 You can skip steps 2-5 if you're using [Sail](https://laravel.com/docs/9.x/sail). After cloning the repository just run `bash bin/setup.sh` in your terminal.

1. Clone the repository
2. Install the composer dependencies by running `composer install`.
3. Copy the `.env.example` and make a `.env` file.
4. Run `php artisan key:generate` to generate an application key.
5. Configure the remaining environment variables.
6. Finally, make sure you've read the through the contributing guidelines and then you're all set to write something awesome.

## Deployments

To issue a new release to production you need to use Github's Release Management by tagging a release and publishing it.

## Contributing

The contribution guide can be found in [CONTRIBUTING.md](CONTRIBUTING.md).
