<?php

namespace Alexo\ContactBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Translation\TranslatorInterface;

class ContactType extends AbstractType
{
    /**
     * @var TranslatorInterface
     */
    protected $translator;

    public function setTranslator(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array(
            'label' => $this->translator->trans('contact_name')
        ));
        $builder->add('email', 'email', array(
            'label' => $this->translator->trans('contact_email')
        ));
        $builder->add('subject', 'text', array(
            'label' => $this->translator->trans('contact_subject')
        ));
        $builder->add('message', 'textarea', array(
            'label' => $this->translator->trans('contact_message')
        ));
        $builder->add('submit', 'submit', array(
            'label' => $this->translator->trans('contact_submit')
        ));
    }

    public function getName()
    {
        return 'contact';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Alexo\ContactBundle\Entity\Contact',
        ));
    }
}
