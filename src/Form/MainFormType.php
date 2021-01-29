<?php
// **********************************************************************************
// **                                                                              **
// ** MainFormType.php                               (c) Wolfram Plettscher 01/2021 **
// **                                                                              **
// **********************************************************************************
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
      ->add ('oldstring', HiddenType::class, array(
        'required' => false,
        ))
      ->add ('string', TextType::class, array(
        'required' => false,
        'attr' => array ('style' => 'width: 200px'),
        ))
      ->add ('submit', SubmitType::class, array ('label' => 'submit'))
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
