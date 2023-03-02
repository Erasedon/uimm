<?php

namespace App\Form;

use App\Entity\Lieu;
use App\Entity\Niveau;
use App\Entity\Domaine;
use App\Entity\Condition;
use App\Entity\Formation;
use App\Entity\CodeFormation;
use App\Entity\FraisScolarite;
use App\Entity\MetierVise;
use App\Entity\TypeFormation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('resume')
            ->add('description')
            ->add('url')
            ->add('duree_heure')
            ->add('duree_hentreprise')
            ->add('duree_mois')
            ->add('image')
            ->add('actif')
            ->add('posseder_condition', EntityType::class, [
                'class' => Condition::class,
                'choice_label' => 'description',
                'expanded' => true,
                'multiple' => true,
                'by_reference' => false
            ])
            ->add('remunerer', EntityType::class, [
                'class' => FraisScolarite::class,
                'choice_label' => 'description',
                'expanded' => true,
                'multiple' => true,
                'by_reference' => false
            ])
            ->add('effectuer_type_formation', EntityType::class, [
                'class' => TypeFormation::class,
                'choice_label' => 'titre',
                'expanded' => true,
                'multiple' => true,
                'by_reference' => false
            ])
            ->add('domaines', EntityType::class, [
                'class' => Domaine::class,
                'choice_label' => 'titre',
                'expanded' => true,
                'multiple' => true,
                'by_reference' => false
            ])
            ->add('niveau',EntityType::class,['class'=>Niveau::class,'choice_label'=>'titre'])
            ->add('viser_metier', EntityType::class, [
                'class' => MetierVise::class,
                'choice_label' => 'titre',
                'expanded' => true,
                'multiple' => true,
                'by_reference' => false
            ])
            ->add('identifier_formation', EntityType::class, [
                'class' => CodeFormation::class,
                'choice_label' => 'code',
                'expanded' => true,
                'multiple' => true,
                'by_reference' => false
            ])
            ->add('situer',EntityType::class, [
                'class' => Lieu::class,
                'choice_label' => 'description',
                'expanded' => true,
                'multiple' => true,
                'by_reference' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
