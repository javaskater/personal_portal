<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace AppBundle\Controller;


namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\FormError;
use AppBundle\Entity\Contact;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/*
* including locale in annotated route see
* http://symfony.com/doc/current/routing.html#advanced-routing-example
*/
class JPMController extends Controller {

	//This function exploits locala set By the LocaleSubscriber Service
	private function getCurrentLocaleFromLocaleSubscriberService(Request $request){
			$found_locale = $request->getLocale();
			if($found_locale == null){
				$found_locale = $this->container->getParameter('default_locale');
			}
			return $found_locale;
	}

	/**
	 * @Route("/", name="jpm_presentation") 	
	 * @method ({"GET"})
	 *         @Template()
	 */
	public function indexAction(Request $request) {
		// Create the form according to the FormType created previously.
		// And give the proper parametephp bin/console doctrine:generate:entities AppBundlers
		$my_ga_code = $this->container->getParameter('my_ga_code');
		$my_locale = $this->getCurrentLocaleFromLocaleSubscriberService($request);
		return [
				'my_ga_code' => $my_ga_code,
				'page_class' => "welcome",
				'nom' => "Jean-Pierre MENA",
				//'locale'=>'en' //for test only
				'locale'=>$my_locale
		];
	}

	/**
	* @Route("/setlocale/{language}", name="setlocale")
	*/
	public function setLocaleAction(Request $request, $language = null)
	{
		if($language != null)
		{
			$request->getSession()->set('_locale', $language);
		}
	
		$url = $request->headers->get('referer');
		if(empty($url))
		{
			$url = $this->container->get('router')->generate('index');
		}
		return $this->redirect($url);
	}

	/**
	 * @Route("/contact_me/{lang}", name="contact_me_action",
	 * 	   defaults={"lang": "en"},
     *     requirements={
     *         "lang": "en|fr|de",
     *     }
     * )
	 *
	 * @method ({"GET","POST"})
	 *         @Template()
	 */
	public function contactAction(Request $request, $lang="en") {

		// Create the form according to the FormType created previously.
		// And give the proper parameters

                $mail_success = FALSE;
                $mail_failure = FALSE;

		// create a task and give it some dummy data for this example
		$contactRequest = new Contact();
		$my_ga_code = $this->container->getParameter('my_ga_code');

                $form = $this->createContactForm($contactRequest,$lang);

		$logger = $this->get('logger');

		if ($request->isMethod ( 'POST' )) {
			// Refill the fields in case the form is not valid.
			$form->handleRequest ( $request );

			if ($form->isValid ()) {
				//Store Locally the Contact Request on a SQLite Database see syfonyDEMO!!!!
				$contactRequest= $form->getData ();
				$contactRequest->setUserlocale($lang);
				$entityManager = $this->getDoctrine()->getManager();
				$entityManager->persist($contactRequest);
				$entityManager->flush();
				date_default_timezone_set('Europe/Paris'); //Otherwise I get one hour too early
				$request_date = date ("D M Y G:i:s");
				// Send mail
				if ($this->sendEmail ( $contactRequest, $request_date)) {
					//Uppdate the stored Object !!!
					$contactRequest->setRequestdate($request_date);
					$entityManager->flush();
                                        unset($contactRequest);
                                        unset($form);
                                        $contactRequest = new Contact();
                                        $form = $this->createContactForm($contactRequest);
					$mail_success = TRUE;
				} else {
					// An error ocurred, handle
					$mail_failure = TRUE;
				}
			} else {
				$validation_errors = $form->getErrors(true);
				$logger->critical('Validation errors see', array(
						// include extra "context" info in your logs
						'form' => $form,
				));
				foreach ($validation_errors as $ve){
					$logger->critical('Problem !', array(
							// include extra "context" info in your logs
							'source' => $ve->getOrigin()->getName(),
							'message' => $ve->getMessage(),
					));
					$form->get($ve->getOrigin()->getName())->addError(new FormError($ve->getMessage()));
				}

			}
		}
		$form_view = $form->createView ();
		return $this->render ( 'AppBundle:JPM:contact.html.twig', array (
				'locale' => $lang,
				'my_ga_code' => $my_ga_code,
				'contact_form' =>  $form_view,
				'nom' => "Contact Jean-Pierre",
				'page_class' => "bg-contact",
                                'mail_failure' => $mail_failure,
                                'mail_success' => $mail_success,
		) );
	}

        private function createContactForm(Contact $contactRequest){

		//see https://stackoverflow.com/questions/11034736/symfony2-formbuilder-add-a-class-to-the-field-and-input
		//see http://symfony.com/doc/current/reference/forms/types/text.html#label-attr which can take directly translation keyss !!! 
            return $this->createFormBuilder($contactRequest)
		->add('subject', TextType::class, array('label_format' => 'contact_form.subject', 'attr' => array('placeholder' => 'contact_form.subject_placeholder'),
												'label_attr' => array('class' => 'col-sm-2 col-form-label')
		))
		->add('name', TextType::class, array('label_format' => 'contact_form.name', 'attr' => array('placeholder' => 'contact_form.name_placeholder'),
											'label_attr' => array('class' => 'col-sm-2 col-form-label')
		))
		->add('email', EmailType::class, array('label_format' => 'contact_form.mail', 'attr' => array('placeholder' => 'contact_form.mail_placeholder'),
											   'label_attr' => array('class' => 'col-sm-2 col-form-label')
		))
		->add('message', TextareaType::class, array('label_format' => 'contact_form.message', 'attr' => array('placeholder' => 'contact_form.message_placeholder'),
													'label_attr' => array('class' => 'col-sm-2 col-form-label')
		))
		->add('Send', SubmitType::class, array('label_format' => 'contact_form.send'))
		->getForm();
        }
	/*
	 * General see http://symfony.com/doc/current/email.html
	 * For 1AND1 see https://openclassrooms.com/forum/sujet/symfony2-swiftmailer-1and1-15593
	 * especially for the values in parameters.yml
	 */
	private function sendEmail($contactrequest, $request_date) {

		$contact_request_date = $request_date;
		$contact_name =  $contactrequest->getName();
		$user_locale =  $contactrequest->getUserlocale();
		$mailfrom = $contactrequest->getEmail();
                $mailto = $this->container->getParameter('mailer_user');
		$contact_subject = $contactrequest->getSubject();
		$contact_message = $contactrequest->getMessage();
		$contact_route_uri = $this->generateUrl('contact_me_action', array(), UrlGeneratorInterface::ABSOLUTE_URL);

		//see http://symfony.com/doc/current/email.html
		$message = new \Swift_Message("Contact request from ".$contact_route_uri);
		$message->setFrom($mailfrom)->setTo($mailto);
		$message->setBody(
            $this->renderView(
                // src/AppBundle/Resources/views/JPM/mail_for_contact.html.twig
                'AppBundle:JPM:mail_for_contact.html.twig',
                array(
                    'contact_route' => $contact_route_uri,
                    'name' => $contact_name,
                    'sent_date' => $contact_request_date,
                    'message_subject' => $contact_subject,
                    'message_content' => $contact_message,
                    'contact_mail' => $mailfrom,
					'user_locale' => $user_locale
            )
            ),
            'text/html'
        );

            return $this->get('swiftmailer.mailer.default')->send($message);
	}
}
