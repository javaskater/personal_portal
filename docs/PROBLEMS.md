## 24/06/2017 :

### duplicate validation messages ...

* It display two times each form_errors message ...
* It doesn't seem to be due to  the Entity Object __@Assert__ annotations because:
  * [The profiler](http://jpmena.and/app_dev.php/_profiler/d36ee9?panel=form) shows only one error for each !!!
  * on that same page I see an error and a validation error ... The dev log
```
[2017-07-24 10:40:59] app.CRITICAL: Validation errors see {"form":"[object] (Symfony\\Component\\Form\\Form: {})"} []
[2017-07-24 10:40:59] app.CRITICAL: Problem ! {"source":"email","message":"Bitte eine gültige Emailadresse eingeben"} []
```

#### TODO:
* see form_widget options ...
* try another [form_error template](https://symfony.com/doc/current/form/form_customization.html) 