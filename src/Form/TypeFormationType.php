<?php

namespace App\Form;

use App\Entity\TypeFormation;
use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;         
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypeFormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('formations', EntityType::class, [
                    'class' => Formation::class,
                    'choice_label' => 'titre',
                    'expanded' => true,
                    'multiple' => true,
                    'by_reference' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TypeFormation::class,
        ]);
    }
}
