<h1 align="center">Image IP Grabber/Logger</h1>
<p align="center"><img height="250" width="250" src="https://raw.githubusercontent.com/haxinja/images/main/haxinja-IMAGE-ip-grabber.png"></p>

## Overview
The Image IP Grabber project is a simple demonstration of how an image file can be used to log visitors' IP addresses when accessed through a web server. It includes an index.php file that logs visitors' IP addresses and serves an image file, along with a .htaccess file for URL rewriting.

**🛈 Note:** ```This project utilizes PHP for server-side scripting and Apache's mod_rewrite module for URL rewriting.```

## ⚠️ Disclaimer
- This project is for educational and demonstration purposes only.
- Any misuse or unlawful use of this project is beyond the responsibility of the developer.

## Setup
1. Clone or download this repository.
2. Upload the entire `ip_grabber` directory to your website directory.
3. Ensure that the server has PHP and Apache with mod_rewrite enabled.
4. Set permissions for writing logs if necessary.
5. Access the `meow.jpg` file through a web browser to trigger the IP logging functionality.
- (_You can change the meow.jpg/image file name this on index.php line 29_)
## Directory Structure
- LICENSE
- README.md
- ip_grabber
  - index.php
  - .htaccess
  - assets
    - 404.html
    - cute_cat.png

## Usage
- The `index.php` file logs visitors' IP addresses when accessed through the web server.
- Accessing the `index.php` file with the filename `meow.jpg` will serve the `cute_cat.png` image file and log the visitor's IP address.
- Accessing the `index.php` file with the filename `ip_logs.txt` and the correct password query parameter (`?p=mypassword123`) will serve the IP log file.

## License
This project is licensed under the terms of the [MIT License](LICENSE).
## Contributing
Contributions are welcome! Feel free to submit pull requests, suggest new features, or report issues.
