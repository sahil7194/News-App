# News App

This repository contains a News App built using **Laravel 11** and **PHP 8.4**, with a simple structure to manage articles and authors. The project demonstrates how to manage relationships between models, handle event listeners, and implement validation features, including content moderation through bad word detection. It is designed to help users validate and control article submissions with the use of **enums** and **REST APIs**.

## Features

-   Models and Relationships: The app consists of two main models, Author and Article, with a one-to-many relationship.
-   Bad Word Detection: An event listener checks for inappropriate or bad words in the article content during creation. If bad words are detected, the article status is automatically set to "rejected."
-   Article Status Management: Uses enums to define and maintain the status of articles (e.g., Pending, Approved, Rejected).
-   REST APIs: Exposes APIs to interact with the articles and authors data, making it easy to integrate with external services or front-end applications.
-   SQLite Database: The database is SQLite, providing a lightweight solution for the project.

### Installation

-   **Clone the repository:**

    ` git clone [https://github.com/your-username/news-app.git](https://github.com/sahil7194/News-App)`

-   Navigate into the project directory:

    `cd news-app`

-   Install the project dependencies via Composer:

    `composer install`

-   Copy the .env.example file to .env and configure the database connection to SQLite:
   
    `cp .env.example .env`

- Set the DB_CONNECTION to sqlite and ensure the DB_DATABASE points to the correct SQLite file:
  ``env``
    ```
     DB_CONNECTION=sqlite
    DB_DATABASE=/path_to_your_database/database.sqlite

-   Run database migrations:
    
    ` php artisan migrate `

-   Generate the application key:
    
    `php artisan key:generate`

-   Start the Laravel development server:
    
    `php artisan serve`

    Your app will be running on http://127.0.0.1:8000.

## Models and Relationships

-   Author Model
    The Author model represents a writer of the articles. It has a one-to-many relationship with the Article model.

-   Article Model
    The Article model represents an article written by an author. It includes the following key fields:

    - `title` (string): The title of the article.
    - `content` (text): The content of the article.
    - `status` (enum): The current status of the article (`Pending, Approved, Rejected`).
    - The article's status is managed using enums, ensuring that only valid statuses are set for each article.

## Event Listeners & Validation
Bad Word Detection
An event listener has been created to validate articles when they are being created. It checks the content for inappropriate language (bad words). If any bad words are found, the article status is automatically updated to "``rejected``".

## API Endpoints

The following REST API endpoints are available for interacting with the articles and authors:

#### Articles

-   GET /api/articles: Get a list of all articles.
-   POST /api/articles: Create a new article.
-   GET /api/articles/{id}: Get details of a specific article by ID.
-   PUT /api/articles/{id}: Update an article by ID.
-   DELETE /api/articles/{id}: Delete an article by ID.

#### Authors

-   GET /api/authors: Get a list of all authors.
-   POST /api/authors: Create a new author.
-   GET /api/authors/{id}: Get details of a specific author by ID.

### Enums for Article Status

The status field in the Article model is managed using an enum, which ensures that only valid statuses can be assigned. The possible statuses are:

-   `Pending`
-   `Approved`
-   `Rejected`

## Contributing

Feel free to fork the repository, create a branch, and submit a pull request if you'd like to contribute to this project. Please ensure that your code follows the coding standards and includes relevant tests.
