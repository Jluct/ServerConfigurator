<?php

namespace Jluct\ConfiguratorServerBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StringConfType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('required', CheckboxType::class, [
                'required' => false,
                'attr' => []
            ])
            ->add('type', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('byDefault', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('orders', IntegerType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('description', TextareaType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'rows' => '4'
                ]
            ])
            ->add('activity', CheckboxType::class, [
                'required' => false,
                'attr' => []
            ])
            ->add('value', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('dependencies', EntityType::class, [
                'class' => 'Jluct\ConfiguratorServerBundle\Entity\StringConf',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('b');
                },
                'choice_label' => 'name',
                'multiple' => true,
                'required' => false,

            ])
            ->getForm();
//            ->add('blockConfig')
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Jluct\ConfiguratorServerBundle\Entity\StringConf'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jluct_configuratorserverbundle_stringconf';
    }


}
