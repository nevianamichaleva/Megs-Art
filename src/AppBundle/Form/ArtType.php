<?php

namespace AppBundle\Form;

use AppBundle\Entity\Arts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ArtType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('artTitle', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Art title ',
                    ),
                    'label' => false,))
                ->add('artSize', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Size ',
                    ),
                    'label' => false, 'required' => false))
                ->add('artCanvas', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Canvas',
                    ),
                    'label' => false, 'required' => false))
                ->add('artPaint', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Paint',
                    ),
                    'label' => false, 'required' => false))
                ->add('artPrice', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Price',
                    ),
                    'label' => false, 'required' => false))
                ->add('artTitleimage', FileType::class, array('label' => false, 'data_class' => null, 'required' => false))
                ->add('artImage', FileType::class, array('label' => false, 'data_class' => null, 'required' => false))
                ->add('artCategory', ChoiceType::class, array(
                    'choices' => array(
                        'Gallery' => 'Gallery',
                        'Paintings for sale' => 'Paintings for sale'), 'label' => false))
                ->add('artDescription', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'Description ',
                        'rows'=>'14',
                        'cols'=>'30'
                    ),
                    'label' => false,))
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => Arts::class,
        ));
    }

}
