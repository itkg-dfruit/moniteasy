<?php
namespace monitoring\ApplicationBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class pingUrlType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id')
            ->add('pingDate')
            ->add('response')
            ->add('httpCode')
            ->add('responseTime')
            ->add('id_checkUrl')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'checkUrlType';
    }

}
