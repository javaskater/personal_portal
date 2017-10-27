<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/* following https://symfony.com/doc/current/validation/translations.html
* to translate the validation messages ....
*/
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Contact
 *
 * @ORM\Table(name="Contact")
 * @ORM\Entity
 */
class Contact
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", nullable=false)
     * @Assert\NotBlank(message = "contact_form.name_message")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="userlocale", type="text", nullable=false,options={"default":"en"})
     */
    private $userlocale;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="text", nullable=false)
     * @Assert\NotBlank(message = "contact_form.mail_message")
     * @Assert\Email(message = "contact_form.mail_message")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", nullable=false)
     * @Assert\NotBlank(message = "contact_form.message_message")
     */
    private $message;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="text", nullable=false)
     * @Assert\NotBlank(message = "contact_form.subject_message")
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="requestdate", type="text", nullable=true)
     */
    private $requestdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Contact
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set userlocale
     *
     * @param string $userlocale
     *
     * @return Contact
     */
    public function setUserlocale($userlocale)
    {
        $this->userlocale = $userlocale;

        return $this;
    }

    /**
     * Get userlocale
     *
     * @return string
     */
    public function getUserlocale()
    {
        return $this->userlocale;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Contact
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set subject
     *
     * @param string $subject
     *
     * @return Contact
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set requestdate
     *
     * @param string $requestdate
     *
     * @return Contact
     */
    public function setRequestdate($requestdate)
    {
        $this->requestdate = $requestdate;

        return $this;
    }

    /**
     * Get requestdate
     *
     * @return string
     */
    public function getRequestdate()
    {
        return $this->requestdate;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
