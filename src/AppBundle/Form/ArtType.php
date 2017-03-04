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

class ArtType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('artTitle', TextType::class)
        ->add('artDescription', TextareaType::class)
        ->add('artSize', TextType::class)
        ->add('artCanvas', TextType::class)
        ->add('artPaint', TextType::class)
        ->add('artPrice', TextType::class)
        ->add('artTitleimage', FileType::class, array('label' => 'Titleimage', 'data_class' => null, 'required' => false))
        ->add('artCategory', ChoiceType::class, array(
                'choices' => array(
                'Gallery' => 'Gallery',
                'Paintings for sale' => 'Paintings for sale')))
        ->add('artImage', FileType::class, array('label' => 'Image', 'data_class' => null, 'required' => false))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Arts::class,
        ));
    }
}