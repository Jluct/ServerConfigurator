<?php

namespace Jluct\ConfiguratorServerBundle\Form;

use Jluct\ConfiguratorServerBundle\Entity\BlockConf;
use Symfony\Bridge\Doctrine\Form\Type\DoctrineType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\VarDumper\VarDumper;

class BlockConfType extends AbstractType
{
    /**
     * {@inheritdoc}
     *
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $em = $options['entity_manager']->getRepository('JluctConfiguratorServerBundle:BlockConf');
        $blocks = $em->findBy(['fileConfig' => $options['data']->getFileConfig()->getId()]);

        VarDumper::dump($blocks);

        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('required', CheckboxType::class, [
                'required' => false,
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
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'rows' => '4'
                ]
            ])
            ->add('orders', IntegerType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('activity', CheckboxType::class, [
                'required' => false,
                'attr' => [
//                    'class' => 'form-control'
                ]
            ])
            ->add('dependencies', ChoiceType::class, [
                'required' => false,
                'choices' => $blocks,
                'multiple' => true,
                'choice_label' => function (BlockConf $blockConf, $key, $index) {
                    return $blockConf->getName();
                },
                'choice_value' => function ($blockConf) {
                    if (method_exists($blockConf, 'getId'))
                        return $blockConf->getId();
                },
                'choice_attr' => function ($blockConf, $key, $index) {
                    return [
                        'class' => 'block_dependencies_' . $blockConf->getId()
                    ];
                },
//                'group_by'=>'',

//                'placeholder' => 'select dependencies'


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
        $resolver->setRequired('entity_manager');
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jluct_configuratorserverbundle_blockconf';
    }


}
