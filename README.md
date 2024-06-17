<p align="center"><img src="https://github.com/OFursova/study-tracker/blob/main/public/study_tracker.png" width="200" alt="Study Tracker Logo"></p>

**Study Tracker** is a web application built with Laravel and Filament. It is designed to help users store, categorize, and structure the items they have learned. The application allows users to filter and search for items by title, topic, or category and generate reports of learned items over a selected period.

## Features

- **Item Management** - store a list of items you have learned, categorized and structured for easy access
- **Filtering and Searching** - filter and search for items by title, topic, or category
- **Report Generation** - generate a report of learned items for a selected period

## Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js and npm
- Sqlite is used, but you can switch to MySQL 
- I have planned to build this app as Filament + NativePHP, but unfortunately they are not compatible due to lacking of [intl extension in php binaries](https://github.com/orgs/NativePHP/discussions/292)

## Installation

1. Clone the repository:
```bash
git clone https://github.com/your-username/study-tracker.git
cd study-tracker
```
2. Install dependencies:
```bash
composer install
npm install
```
3. Create a copy of the .env file:
```bash
cp .env.example .env
```
4. Generate an application key:
```bash
php artisan key:generate
```
5. Update your .env file with necessary credentials:
```makefile
APP_NAME="Study Tracker"
APP_URL=http://tracker.test
```
6. Run database migrations:
```bash
php artisan migrate
```
7. Seed the database (optional if you want to add default categories and topics):
```bash
php artisan db:seed
```
8. Build front-end assets:
```bash
npm run build
```
9. Serve the application:
```bash
php artisan serve
```
10. Access the application:
Open your browser and go to http://localhost:8000 (or whatever local url was set by you to this project)

## Usage

### Adding Items

1. Click 'New item' button at the top of the table
2. Fill in the details such as title, topic, category, and url.
3. Save the item.

### Filtering and Searching Items

1. Use the filter options at the top of the table to narrow down items by title, topic, or category.
2. Use the search bar at the top to quickly find items by their title.

### Generating Reports

1. Pick the needed items by checking them at the left border of the table (you can filter the items first)
2. Click 'Get report' button at the top of the table
3. Copy the content if needed
4. Close the modal window

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/your-feature-name`).
3. Commit your changes (`git commit -am 'Add some feature'`).
4. Push to the branch (`git push origin feature/your-feature-name`).
5. Create a new Pull Request.

## License

This project is licensed under the MIT License
