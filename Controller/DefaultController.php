<?php

namespace Alexo\ContactBundle\Controller;

use Alexo\ContactBundle\Entity\Contact;
use Alexo\ContactBundle\Form\Type\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="contact")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $contact = new Contact();
        $form = new ContactType();
        $form->setTranslator($this->get('translator'));
        $form = $this->createForm($form, $contact);

        if($request->isMethod('post')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $receiverEmails = $this->container->getParameter('contact.receiver_emails');
                if(!empty($receiverEmails)) {
                    $message = \Swift_Message::newInstance()
                        ->setSubject($contact->getSubject())
                        ->setFrom($contact->getEmail())
                        ->setBody($contact->getName() . '<br />' . $contact->getEmail() . '<br >' . $contact->getMessage(), 'text/html'
                        );
                    foreach ($receiverEmails as $email) {
                        $message->setTo($email);
                        $this->get('mailer')->send($message);
                    }
                    /* @var $translator \Symfony\Bundle\FrameworkBundle\Translation\Translator */
                    $translator = $this->get('translator');
                    $this->get('session')->getFlashBag()->add(
                        'success',
                        $translator->trans('contact_sent')
                    );

                    return $this->redirect($this->generateUrl('contact'));
                }
            }
        }
        return array(
            'form' => $form->createView()
        );
    }
}
