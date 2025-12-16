# Contributing to Dairy Farm Management System

Thank you for your interest in contributing to the Dairy Farm Management System! This document provides guidelines and instructions for contributing.

## Getting Started

1. **Fork the repository** on GitHub
2. **Clone your fork** to your local machine:
   ```bash
   git clone https://github.com/YOUR-USERNAME/Dairy-Farm-Management-System.git
   cd Dairy-Farm-Management-System
   ```
3. **Create a feature branch**:
   ```bash
   git checkout -b feature/your-feature-name
   ```

## Development Setup

1. Ensure you have PHP 7.4+ and MySQL installed
2. Import the database schema: `mysql -u root -p < database.sql`
3. Configure your database connection in `config/database.php`
4. Start your local server and test the application

## Code Guidelines

- Follow PSR-12 PHP coding standards
- Write clean, readable, and well-commented code
- Use meaningful variable and function names
- Ensure all code is tested before submission
- Document any new features or changes

## Commit Messages

Use clear and descriptive commit messages:
- Format: `type: brief description`
- Examples:
  - `feat: add inventory tracking feature`
  - `fix: resolve order processing bug`
  - `docs: update README with setup instructions`

## Submitting Changes

1. **Push to your fork**:
   ```bash
   git push origin feature/your-feature-name
   ```
2. **Create a Pull Request** on GitHub
3. Describe your changes clearly in the PR description
4. Ensure all tests pass and code quality checks are satisfied
5. Wait for review and feedback

## Pull Request Process

- Update documentation as needed
- Add or update tests for your changes
- Ensure your code follows the project's style guidelines
- Provide a clear description of what your PR does
- Link any related issues

## Reporting Issues

When reporting bugs, please include:
- A clear description of the issue
- Steps to reproduce the problem
- Expected vs. actual behavior
- Screenshots (if applicable)
- Your environment details (PHP version, browser, OS)

## Community

- Respect all community members
- Be constructive in feedback
- Help others learn and grow
- Share knowledge and best practices

## License

By contributing to this project, you agree that your contributions will be licensed under the MIT License.

## Questions?

Feel free to reach out to the project maintainer at lohithgayam007@gmail.com

Happy contributing! 🎉
