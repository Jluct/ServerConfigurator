<?php

namespace Jluct\ConfiguratorServerBundle\Form;

use Jluct\ConfiguratorServerBundle\Entity\BlockConf;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\VarDumper\VarDumper;

class BlockConfType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        VarDumper::dump($options);

        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('required', CheckboxType::class, [
                'attr' => [
//                    'class' => 'form-control'
                ]
            ])
            ->add('date', DateTimeType::class, [
                'attr' => [
//                    'class' => 'form-control'
                ]
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'rows' => '4'
                ]
            ])
            ->add('orders', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('activity', CheckboxType::class, [
                'attr' => [
//                    'class' => 'form-control'
                ]
            ])
            ->add('dependencies', ChoiceType::class, [
                'choices' => $options['block'],
                'choice_label' => function (BlockConf $blockConf, $key, $index) {
                    return $blockConf->getName();
                },
//                'choice_value' => function (BlockConf $blockConf) {
//                    return $blockConf->getId();
//                }
                'choice_attr' => function ($blockConf, $key, $index) {
                    return ['class' => 'category_' . strtolower($blockConf->getName())];
                },

            ])
//            ->add('dependent')
//            ->add('fileConfig')
            ->getForm();
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Jluct\ConfiguratorServerBundle\Entity\BlockConf'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jluct_configuratorserverbundle_blockconf';
    }


}
