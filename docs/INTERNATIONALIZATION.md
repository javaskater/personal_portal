# Internationalization

* 2 Ways of doing... 
  * individual messages with __XLIFF 2__ files
  * or routing differently depending on the Locale

## individual messages

* Using the [Symfony 3 translation project](http://symfony.com/doc/current/translation.html)
* [Counsels for the i18n](https://symfony.com/doc/current/best_practices/i18n.html)
* [XLIFF 2.0 specifications](http://docs.oasis-open.org/xliff/xliff-core/v2.0/os/xliff-core-v2.0-os.html)
  * see the 4.2.1 paragraph explaining the tree !!!
* I recommmend [that very clear Blog Post for using XLIFF in Symny 3.0](https://phraseapp.com/blog/posts/translate-symfony-3-apps/)
  * It explains how to use the resname in twig _<trans>_
* Let the page change translation ....
  *  _Fr_, _De_, Fallback _En_ ..

### Routing depending on locale

* another way is to change your controller depending on your Locale
  * That [Symfony 3's resource](https://symfony.com/doc/current/translation/locale.html) explains what to do
  * The [most standardized way to use XLF Files](https://symfony.com/doc/current/best_practices/i18n.html)

## getting the locale from the session

* [locale's session](https://symfony.com/doc/current/session/locale_sticky_session.html)
  * I still have a problem at [the event ssubscription](http://symfony.com/doc/current/doctrine/event_listeners_subscribers.html)
* Et en français ... [changer langue dans Symfony 2](http://www.benjaminschied.fr/changer-la-langue-dans-symfony-2/)
* Everything is summerized in this [french openclassroom post](https://openclassrooms.com/forum/sujet/symfony-setlocale-langue?page=1)

### Switching to the language of the Navigator

* Found [this FF extension](https://addons.mozilla.org/fr/firefox/addon/quick-accept-language-switc/) to switch between language depending on the Naavigator language ...
<pre>

</pre>