<?php

namespace App\Form\Type;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\ReloadType as ReloadTypeEntity;

class ReloadType extends AbstractType
{
  protected $em;

  public function __construct(EntityManagerInterface $em)
  {
    $this->em = $em;
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $results = $this->em->getRepository(ReloadTypeEntity::class)->findActivated();
    $choices = [];
    foreach ($results as $result)
    {
      $choices[$result->__toString()] = $result->getId();
    }
    $resolver->setDefaults([
                             'choices' => $choices
                           ]);
  }

  public function getParent()
  {
    return ChoiceType::class;
  }
}