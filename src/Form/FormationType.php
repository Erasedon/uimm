<?php

namespace App\Form;

use App\Entity\Niveau;
use App\Entity\Domaine;
use App\Entity\Formation;
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
            ->add('posseder_condition')
            ->add('remunerer')
            ->add('effectuer_type_formation')
            ->add('domaines', EntityType::class, [
                'class' => Domaine::class,
                'choice_label' => 'titre',
                'expanded' => true,
                'multiple' => true,
                'by_reference' => false
            ])
            ->add('niveau',EntityType::class,['class'=>Niveau::class,'choice_label'=>'titre'])
            ->add('viser_metier')
            ->add('identifier_formation')
            ->add('situer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
