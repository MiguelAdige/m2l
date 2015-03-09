<?php

namespace M2L\MessagerieBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MsgType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('destinataire', 'text', array(
            'required'  => true,
            'label'     => false,
            'attr'      => array(
                'placeholder'   => 'Pseudo du destinataire')
        ));
        $builder->add('msg', 'textarea', array(
            'required'  => true,
            'label'     => false,
        ));
        $builder->add('Envoyer', 'submit');
    }

    public function getName()
    {
        return '';
    }
}
?>