# Using Lumen Micro Framework

## How to run this task

- Once clone the task, go to the project root inside **public_html/git-stared-repo** directory and run **./start.sh** to install and build the project.
- After installation complete the task is ready and working on port **8070**.
- The endpoint **`http://localhost:8070/stared-repos`**, for limit and filteration the result search we must send the search keywords query with **`q`** parameter like `created, stars, language, forks`
- Sorting the result use `sort` parameter, for ordering use `order` with `asc or desc` value, to get specific number use `per_page` with the number like 10, 20 or 100.


## How to send the parameters and their values

- First we must use these `e, gt, gte, lt, lte` before the filteration value separated by `:`  like `gt:100` `e:php` `lt:2020-01-10&`.
```sh
e    => equal
gt   => greater than
gte => greater than or equal
lt    => lower than
lte  => lower than or equal
```

```sh
Ex: http://localhost:8070/stared-repos?created=lte:2020-01-10&stars=gt:100&language=e:php
```

- For sorting, ordering and get specific number  `sort=stars` `order=desc` `per_page=10`
```sh
Ex: http://localhost:8070/stared-repos?created=gte:2020-01-10&stars=gt:100&sort=stars&order=desc&per_page=10&language=e:php
```

## How to test task
- We should use `docker exec -it stared_repo_php vendor/bin/phpunit`
