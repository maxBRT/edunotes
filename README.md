# EduNotes

A simple, free, and open-source platform to help students stay organized.

https://edunotes.ca/

## About

EduNotes is a straightforward tool built for students who need a simple way to manage their academic life. No complex features, no overwhelming interfaces—just the essentials to keep you organized.

## Features

- Organize your classes and notes
- Simple, clean interface
- Download your notes as markdown file
- Free to use, forever

## Purpose

This project was created with one goal in mind: to provide students with an accessible, no-frills solution for staying on top of their coursework. We believe that productivity tools should be simple, not complicated.

## Coming up next

- Full text search
- Create class related assignments with due date
- Let me know what you would like !

## Getting Started

### Requirements

- PHP 8.4+
- Composer
- Node.js & npm

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/maxBRT/edunotes.git
   cd edunotes
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install
   ```

3. Set up your environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Run migrations:
   ```bash
   php artisan migrate
   ```

5. Build assets and start the server:
   ```bash
   npm run build
   composer run dev 
   ```

Visit `http://localhost:8000` to start using EduNotes.

## Testing Emails Locally

EduNotes uses Mailhog for local email testing, allowing you to capture and view emails sent by the application without actually sending them.

### Running Mailhog

Install and run Mailhog:
```bash
# Install Mailhog (macOS with Homebrew)
brew install mailhog

# Or download from: https://github.com/mailhog/MailHog/releases

# Run Mailhog
mailhog
```

### Configuration

Your `.env` file should have the following mail configuration:

```env
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```

Once configured, any emails sent by the application will appear in the Mailhog web interface at `http://localhost:8025`.

## Contributing

Contributions from the community are welcomed! Whether it's bug fixes, new features, or documentation improvements, your help is appreciated.

Please feel free to:
- Report bugs by opening an issue
- Suggest new features
- Submit pull requests

## License

EduNotes is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).



