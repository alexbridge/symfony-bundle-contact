<?php
namespace Alexo\ContactBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = "4",
     *      max = "50"
     * )
     * @var string
     */
    private $name;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     * @Assert\Length(
     *      min = "5",
     *      max = "120"
     * )
     * @var string
     */
    private $email;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = "2",
     *      max = "150"
     * )
     * @var string
     */
    private $subject;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = "10",
     *      max = "5000"
     * )
     * @var string
     */
    private $message;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}
