### 21/03/2017

* find a way to link the email senting adresses to a prod/dev parameter services ....
* The validator error messages do not appear !!! nothing in form->getErrors
* Should we use __Captchas__ ?

### 28/03/2017

* I should perhaps think about :
  * a [bootstrap validation](https://github.com/1000hz/bootstrap-validator)
  * or a [Jquery Validation](https://jqueryvalidation.org/)
* Instead of the [Symfony validation](http://symfony.com/doc/current/forms.html) I am dealing with ...

### 28/04/2017

* gives a twig template to the contact message to be sent ...
* complete the resumee !!!
* complete the page to your realisations !!!!
* find a way to make it in many languages ...
* Change the Bootstrap default appearance through SASS
  * Include jpmena.css in the process ...

### 29/04/2017

* Bug: The contact's for sent date is in english and one hour too early (British Time ?)
  * received in the mail ... / Twig ...

# Project 

## 08/07/2017

* Starting with internationalization's questions see [the page on that embedded WIKI](INTERNATIONALIZATION.md)

## 12/07/2017

* Trying to get the locale from the user's session  and adapting my link
  * either to a part of a page (tabs)
  * to an entire page (contact)

## 19/07/2017

* Finishing translations
* Replacing default locale from Server's kernel to client's default locale ....

## 22/07/2017

* Add A Google Cpatcha/Recaptcha like on the [Leading Fellows Contact Page](https://www.leadingfellows.com/contact)
* Is there a newer version of Bootstrap 4 ????
* Change for a Wordpress Blog ???? (d8.jpmena.eu -> blog.jpmena.eu)
* The validation messages only outpu __veuillez compléter ce champs__ (why, and why in French ????)
* Testing the saving and sending, I forgot _Attempted to call an undefined method named "setUserlocale" of class "AppBundle\Entity\Contact"._
  * The same for the Form ???? No Problem / done the next day !!!

## 23/07/2017
* Add A Google Cpatcha/Recaptcha like on the [Leading Fellows Contact Page](https://www.leadingfellows.com/contact)
* Is there a newer version of Bootstrap 4 ????
* Change for a Wordpress Blog ???? (d8.jpmena.eu -> blog.jpmena.eu)
* The validation messages only outpu __veuillez compléter ce champs__ (why, and why in French ????)
* The alert/error message after a sennt message to be translated
* PDF download in a SQLLIte Table!: IP source, downloaded File, userlocale ...