## Laravel App Boilerplate

The purpose of this boilerplate is to help you save time building your laravel app.

It comes with:

- Bootstrap template
- User registration and login
- Default PagesController for static pages (ex: "About" in the menu)

Check out this [live demo](http://didiertoussaint.be/laravelapp/)

### Local development

The DB connection information must be stored in a (gitignored) file called ".env.local.php" at the root of the project, as follow :

```php
<?php
return [
	"DB_HOST" 		=> "",
	"DB_NAME" 		=> "",
	"DB_USERNAME" 	=> "",
	"DB_PASSWORD" 	=> ""
];
```
