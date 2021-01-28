<?php
// **********************************************************************************
// **                                                                              **
// ** MainFormType.php                               (c) Wolfram Plettscher 01/2021 **
// **                                                                              **
// **********************************************************************************
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
//use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


// **********************************************************************************
// **                                                                              **
// ** class: MainFormType                                                          **
// **                                                                              **
// **********************************************************************************
class MainFormType extends AbstractType
{

  // ********************************************************************************
  // **                                                                            **
  // ** function: buildForm                                                        **
  // **                                                                            **
  // ********************************************************************************
  public function buildForm (FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add ('submit', SubmitType::class, array ('label' => 'submit String'))
      ;
  }
  
  // ********************************************************************************
  // **                                                                            **
  // ** function: configureOptions                                                 **
  // **                                                                            **
  // ********************************************************************************
//  public function configureOptions (OptionsResolver $resolver)
//  {
//    $resolver->setDefaults (array (
//      'data_class' => 'App\Entity\Project',
//    ));  
//  }
}
