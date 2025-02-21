
# LibraryJavaCard

- Backend side of Smart Card Programming project - LibraryJavaCard

- Providing users, books, genres CRUD, books borrowing APIs

> [!IMPORTANT]
> This project planned to run locally so all APIs have no auth.

> [!IMPORTANT]
> Deleting APIs methods should be DELETE, etc... right? But all role, auth things will be done by app side so...
## Authors

- [@4zur3-xd](https://www.github.com/4zur3-xd)


## Documentation

- [APIs List](https://docs.google.com/spreadsheets/d/1hkmy9BDqOG5nWDKmHUfrYm2__EsYiUwsTC7ujKsuN6o/edit?gid=1115838130#gid=1115838130)


## Run Locally

Clone the project

```bash
  git clone https://github.com/4zur3-xd/LibraryJavaCard
```

Go to the project directory

```bash
  cd LibraryJavaCard
```

Install dependencies

```bash
  composer install
```

Migrate

```bash
  php artisan migrate
```

Start the server

```bash
  php artisan serve
```
## Tech Stack

**Server:** Laravel v11.36.1 - PHP v8.2.12

**Database:** MySQL
