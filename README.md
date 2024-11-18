# Contact Form with Email and Database Storage

A simple PHP-based contact form that uses PHPMailer for sending emails and stores form submissions in a MySQL database. The form features a clean, rounded design using Bootstrap for styling.

## Features
- **Email Functionality**: Uses PHPMailer to send emails to an admin and provide a confirmation message to the user.
- **Database Storage**: Saves form submissions (name, email, and message) in a MySQL database.
- **Responsive Design**: Built with Bootstrap 4 for a mobile-friendly layout and rounded form styling.
- **Environment Variables**: Uses `vlucas/phpdotenv` to manage sensitive information securely.

## Getting Started

### Prerequisites
- **PHP**: Make sure PHP is installed on your system.
- **Composer**: Used to manage dependencies like PHPMailer and dotenv.
- **XAMPP** or **MAMP**: To set up a local development environment with Apache and MySQL.

### Installation
1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/contact-form.git
   cd contact-form

2. **Install dependencies**:
   ```bash
   composer install

3. **Set up your `.env` file**:
   - Create a `.env` file in the root directory.
   - Add your configuration:
     ```env
     SMTP_HOST=smtp.example.com
     SMTP_PORT=587
     SMTP_USERNAME=your-email@example.com
     SMTP_PASSWORD=your-email-password
     FROM_EMAIL=your-email@example.com
     FROM_NAME=Your Name
     DB_HOST=localhost
     DB_NAME=your_db_name
     DB_USER=your_db_user
     DB_PASS=your_db_password
     ```

4. **Set up the database**:
   - Create a database named `contact_form_db`.
   - Run the following SQL command to create the `emails` table:
     ```sql
     CREATE TABLE emails (
         id INT AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(255) NOT NULL,
         email VARCHAR(255) NOT NULL,
         message TEXT NOT NULL,
         sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
     );
     ```

5. **Start your local server**:
   - Using XAMPP or MAMP, start the Apache and MySQL servers.
   - Visit `http://localhost/contact-form` to view the form.

## Usage
- Fill out the contact form with your name, email, and message.
- On submission, the form will send an email to the specified admin email and store the submission in the database.
- A success message will be displayed, and the form will reload.

## Technologies Used
- **PHP**: Backend logic
- **PHPMailer**: For sending emails
- **MySQL**: Database for storing form submissions
- **Bootstrap 4**: For responsive and styled form design
- **Composer**: Dependency management
- **dotenv**: For handling environment variables

## Contact
- **Your Name**: [chasemoffat11@gmail.com](mailto:chasemoffat11@gmail.com)
- **GitHub**: [https://github.com/Chasem11](https://github.com/Chasem11)

