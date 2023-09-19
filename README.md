# Laravel OCR Package

![Packagist Version](https://img.shields.io/packagist/v/hossamsoliuman/laravel-ocr)
![Packagist Downloads](https://img.shields.io/packagist/dt/hossamsoliuman/laravel-ocr)
![License](https://img.shields.io/github/license/hossamsoliuman/laravel-ocr)

The Laravel OCR package provides optimal character recognition capabilities in Laravel applications. It integrates with Tesseract OCR and offers features such as offline OCR, language selection, and more.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
  - [Routes and Controllers](#routes-and-controllers)
- [Available Languages](#available-languages)
- [User Words](#user-words)
- [Contributing](#contributing)
- [License](#license)

## Installation

You can install this package via Composer:

```bash
composer require hossamsoliuman/laravel-ocr
```
## Routes and Controllers

### Routes
This package provides routes and controllers for OCR processing. You can access the OCR functionality via the following routes:

- **POST /offline-ocr/image**: Perform offline OCR on an image.
  - Accepts `image` (image file) and `lang` (language selection) parameters.
  - Optional `user_words` parameter for user-specific words (see User Words).

- **GET /languages**: Retrieve a list of available languages for OCR.

Make sure to include these routes in your Laravel application as needed. You can also customize the routes and controllers to fit your application's requirements.

### Available Languages
You can select the language(s) for OCR processing using the `lang` parameter when making requests. By default, English (`eng`) is used. You can specify multiple languages as a comma-separated list, e.g., `eng,ara`.

To retrieve a list of available languages, you can access the `/languages` route.

### User Words
You can provide a user-specific words file to improve OCR accuracy when dealing with technical terminology or jargon. To use user words, include the `user_words` parameter when making OCR requests, and provide a text file containing the desired words.

**Example usage**:

```bash
curl -X POST -F "image=@image.png" -F "user_words=@user-words.txt" http://your-app.com/offline-ocr/image
```
## Contributing

Contributions are welcome! We appreciate your interest in improving this package. To get started with contributing, please read our [contribution guidelines](CONTRIBUTING.md). Your contributions can help make this package even better.

## License

This package is open-source software licensed under the [MIT License](LICENSE). You are free to use, modify, and distribute this software in accordance with the terms of the MIT License. See the [LICENSE](LICENSE) file for more details.
