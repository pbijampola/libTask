
# Ellipsis Library Management System

This is a Library Management System, a web-based application that allows users to access and manage a collection of books. The system provides a user-friendly interface for users to view,like & dislike, comment and mark &unmark books as favorite, as well as for Admin to manage the collection and users.


![Logo](https://ellipsis.co.tz/images/Ellipsis-02.png)


## Installation

Instructions on How to Install it Locally

1:Clone the repository to your local machine using
```bash
'git clone https://github.com/pbijampola/libtask.git'
```
2:Change into the project directory using
```bash
'cd libtask'
```
3:Run the command below to install the project dependencies
```bash
'composer install'
``` 
4:Rename the .env.example file to .env and fill in the necessary information for your local environment
```bash
'cp .env.example .env' using ubuntu
```
5:Run to generate an application key
```bash
'php artisan key:generate'
```
6:Run to create the necessary tables in the database
```bash
'php artisan migrate'
```
7:Run to seed the database with dummy data (Optional)
```bash
'php artisan db:seed' i.e UsersSeeder & BooksTableSeeder
```
8:Run to start the development server
```bash
'php artisan serve'
```
9:Visit http://localhost:8000 in your browser to access the application



    
## API Documentation

Visit the link below to access the api of ellipsi library management system

[Documentation](https://linktodocumentation)


## Authors

- [@PATRICK BIJAMPOLA](https://www.github.com/pbijampola)


## Contributing

Contributions are always welcome to help make the system  more user friendly!


## License

[MIT](https://choosealicense.com/licenses/mit/)

