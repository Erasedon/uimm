<?php

namespace App\Controller;

use Knp\Snappy\Pdf;
use App\Entity\Niveau;
use App\Entity\Domaine;
use App\Entity\TypeFormation;
use App\Repository\NiveauRepository;
use App\Repository\DomaineRepository;
use App\Repository\FormationRepository;
use App\Repository\TypeFormationRepository;
use Knp\Bundle\SnappyBundle\KnpSnappyBundle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class FormationController extends AbstractController
{
    #[Route('/formation', name: 'app_formation')]
    public function index(FormationRepository $formationRepo, Request $request, DomaineRepository $domaineRepo, NiveauRepository $niveauRepo, TypeFormationRepository $typeformationRepo): Response
    {
        $domaine = $request->query->get('domaine', null);
        $niveau = $request->query->get('niveau', null);
        $typeFormation = $request->query->get('type', null);

        $formations = $formationRepo->filterFormations($domaine, $niveau, $typeFormation);

        $form = $this->createFormBuilder()
            ->add('domaine', EntityType::class, [
                'mapped' => false,
                'class' => Domaine::class,
                'choice_label' => 'titre',
                'placeholder' => 'Choisir un domaine',
                'label' => 'Domaine : ',
                'required' => false,
                'data' => $domaine ? $domaineRepo->find($domaine) : null
            ])
            ->add('niveau', EntityType::class, [
                'mapped' => false,
                'class' => Niveau::class,
                'choice_label' => 'titre',
                'placeholder' => 'Choisir un niveau',
                'label' => 'Niveau : ',
                'required' => false,
                'data' => $niveau ? $niveauRepo->find($niveau) : null
            ])
            ->add('type', EntityType::class, [
                'mapped' => false,
                'class' => TypeFormation::class,
                'choice_label' => 'titre',
                'placeholder' => 'Choisir un type de formation',
                'label' => 'Type : ',
                'required' => false,
                'data' => $typeFormation ? $typeformationRepo->find($typeFormation) : null
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $domaine = $form->get('domaine')->getData() ? $form->get('domaine')->getData() : null;
            $niveau = $form->get('niveau')->getData() ? $form->get('niveau')->getData() : null;
            $typeFormation = $form->get('type')->getData() ? $form->get('type')->getData() : null;

            $url = $this->generateUrl('app_formation', [
                'domaine' => $domaine ? $domaine->getId() : "", 
                'niveau' => $niveau ? $niveau->getId() : "", 
                'type' => $typeFormation ? $typeFormation->getId() : ""
            ]);

            return $this->redirect($url);
        }

        return $this->render('pages/formation/index.html.twig', [
            'formations' => $formations,
            'form' => $form->createView()
        ]);
    }

    #[Route('/formation/{id}', name: 'app_formation_detail')]
    public function detail(FormationRepository $formationRepo, int $id): Response
    {

        $formation = $formationRepo->find($id);
        
        return $this->render('pages/formation/detail.html.twig', [
            'formation' => $formation
        ]);

    }

    #[Route('/formation/pdf/{id}', name: 'app_formation_detail_pdf')]
    public function detail_pdf(Pdf $knpSnappyPdf, FormationRepository $formationRepo, int $id)
    {
        $formation = $formationRepo->find($id);

        $html = $this->renderView('pages/formation/detail_pdf.html.twig', array(
            'formation' => $formation
        ));

        return new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html),
            'file.pdf'
        );

    }
}
