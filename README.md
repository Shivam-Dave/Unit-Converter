# Unit Converter

The Unit Converter is a simple web application built with HTML and PHP, designed to convert values between different units of length, weight, temperature, and height. It provides a user-friendly interface where users can input a value, select the unit type and specific units to convert from and to, and instantly see the converted value.

## Features

- Convert values between different units of length (meters, kilometers, miles, etc.).
- Convert values between different units of weight (grams, kilograms, pounds, etc.).
- Convert values between different units of temperature (Celsius, Fahrenheit, Kelvin).
- Convert values between different units of height (centimeters, inches, feet, etc.).
- User-friendly interface for easy input and output of conversion values.

## Requirements

- XAMPP (or any other local server environment)
- MySQL Database

## Installation

1. **Clone the repository:**

   ```sh
   git clone https://github.com/yourusername/unit-converter.git

2. **Start XAMPP:**
   - Open the XAMPP Control Panel.
   - Start the Apache and MySQL modules.

3. **Set up the database:**
   - Open phpMyAdmin (usually accessible at `http://localhost/phpmyadmin`).
   - Create a new database named `unit_converter`.
   - Import the `unit_converter.sql` file located in the `db` folder of the project repository.

4. **Configure the project:**
   - Move the project folder to the `htdocs` directory of your XAMPP installation (usually located at `C:\xampp\htdocs` on Windows).
   - Update the database connection settings in `config.php` file if necessary.

5. **Access the application:**
   - Open your web browser and navigate to `http://localhost/unit-converter`.

## Usage

1. Enter a value in the input field.
2. Select the unit type (length, weight, temperature, height).
3. Select the units to convert from and to.
4. Click the "Convert" button to see the converted value instantly.

## Contributing

Contributions are welcome! Please fork the repository and create a pull request with your changes. Ensure that your code follows the project coding standards and includes appropriate tests.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contact

For any questions or suggestions, please contact [your email address].
