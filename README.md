# multiple-database-pattern
Pattern for using multiple database or change from one database to another.

When using NoSQL databases or RDBMS, the changing database is not simple. For example must of peaple usse ORM, ODM for this purpose. But with using ORM or ODM we can't run complex query over the database like an MongoDB or Elasticsearch.
For this reason we can create model for each of database but with same function (input, output).

I wrote this example with MongoDB and MySQL.

With this pattern we have a factory class for loading the requested model and database mode. if database mode is not entered the default database mode used.
Note: This is just sample to show behaviors of pattern and need to maintenance for production uses.

For using, Run composer autoload dump command in composer

~~~
php composer.phar dump-autoload
~~~