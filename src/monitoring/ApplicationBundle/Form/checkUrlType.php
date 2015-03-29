<?php
namespace monitoring\ApplicationBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class checkUrlType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('url')
            ->add('timeOut')
            ->add('pingInterval')
            ->add('tags')
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
