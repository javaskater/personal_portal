<?php 
// src/AppBundle/EventSubscriber/LocaleSubscriber.php
namespace AppBundle\EventSubscriber;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


//taken as is from https://symfony.com/doc/current/session/locale_sticky_session.html
class LocaleSubscriber implements EventSubscriberInterface
{
    private $defaultLocale;
    private $preferred_languages;

    public function __construct($defaultLocale = 'en')
    {
        $this->defaultLocale = $defaultLocale;
        $this->preferred_languages = array('fr','de', 'en');
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        if (!$request->hasPreviousSession()) {
            /*following answer 17 of 
            * https://stackoverflow.com/questions/12140162/why-does-symfony-ignore-the-browsers-locale-setting-http-request-accept-languag
            * I check  my navigator's preferred language
            */
            $preferred_language = $request->getPreferredLanguage();
            if (strlen( $preferred_language ) >= 2 ){
                $prefix_preferred_language = substr ( $preferred_language , 0 , 2); 
                if (in_array($prefix_preferred_language, $this->preferred_languages )){
                    $navigator_locale = $prefix_preferred_language;
                    $request->getSession()->set('_locale', $navigator_locale);
                    $request->setLocale($request->getSession()->get('_locale', $this->defaultLocale));
                }
            }
            return;
        }

        // try to see if the locale has been set as a _locale routing parameter
        if ($locale = $request->attributes->get('_locale')) {
            $request->getSession()->set('_locale', $locale);
            $request->setLocale($locale);
        } else {
            // if no explicit locale has been set on this request, use one from the session
            $request->setLocale($request->getSession()->get('_locale', $this->defaultLocale));
        }
    }

    public static function getSubscribedEvents()
    {
        return array(
            // must be registered after the default Locale listener
            KernelEvents::REQUEST => array(array('onKernelRequest', 15)),
        );
    }
}