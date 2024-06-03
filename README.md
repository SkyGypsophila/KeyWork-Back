## About KeyWork

A reliable, efficient and convenient online short-term job platform, mainly for college students to make the most of their strengths and time to obtain suitable income by providing high-quality services.

### For development
We are in the early stgage of application development. To ensure consistency, make sure we have a development environment, having `PHP`, `MySQL` and `Composer` installed on local machine. For quick start, install `Xampp`(which integrated with PHP and MySQL) and `Composer`(Package management for PHP) independently. First, install Xampp and restart the computer. Then, proceed with the Composer installation, as it requires the PHP interpreter as its dependency.

#### Clone the repository
- Run `git clone {url}` to clone the current repository.
- Locate to the cloned repository folder.

#### Install dependencies
- Run `composer install` to install all required packages.

#### Generate Application Key
- Run `php artisan key:generate` to generate a  key for encrypting sensitive data.

#### Configure the Environment file
- Create a new `.env` file by copying the contents of `.env.example`.
- Open the `.env` file and update the database credentials.
    - DB_CONNECTION=mysql
    - DB_HOST=127.0.0.1
    - DB_PORT=3306
    - DB_DATABASE=keywork
    - DB_USERNAME=root
    - DB_PASSWORD=
- Don't forget to open the Xampp, activating Apache and MySQL, click `Admin` on MySQL option, create a database named keywork(as we specified on DB_DATABASE).
  
#### Create Database Tables
- Run `php artisan migrate`.
  
### Seed the Database with default/fake data
- Run `php artisan db:seed`.

### Run the Back-End Service
- Run `php artisan serve`
- 
You should see the message that indicating `Server running on [http://127.0.0.1:8000]`.




