<?php
// **********************************************************************************
// **                                                                              **
// ** HelloController.php                           (c) Wolfram Plettscher 11/2020 **
// **                                                                              **
// **********************************************************************************

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

// **********************************************************************************
// **                                                                              **
// ** class: HelloController                                                       **
// **                                                                              **
// **********************************************************************************
class HelloController extends AbstractController
{

  // ********************************************************************************
  // **                                                                            **
  // ** function: root                                                             **
  // **                                                                            **
  // ********************************************************************************
  /** 
   * @Route ("/", name="root_api", methods={"GET"})
   */
  public function root(): Response
  {
    $data = [
      'message' => "This is the root path to Wolframs Hello Microservice",
    ];
    return new JsonResponse ($data, Response::HTTP_OK);

  }

  // ********************************************************************************
  // **                                                                            **
  // ** function: hello                                                            **
  // **                                                                            **
  // ********************************************************************************
  public function hello(): Response
  {
    $data = [
      'hello' => "hello to Wolframs world",
    ];
    return new JsonResponse ($data, Response::HTTP_OK);

  }

  // ********************************************************************************
  // **                                                                            **
  // ** function: getWife                                                          **
  // **                                                                            **
  // ********************************************************************************
  /** 
   * @Route ("/getWife", name="getWife_api", methods={"POST"})
   */

  public function getWife (Request $request): Response
  {
#   $data = json_decode ($request->getContent(), true);
    
#   $data['abc'] = $data['hello'];
#   $data ['xyz']['hugo'] = 'xyz';

#   $data = [
#     'hello' => "hello to Toms world",
#   ];

    $outdata ['person']['firstname'] = 'Ginny';
    $outdata ['person']['lastname'] = 'Weasly';
    $outdata ['person']['age'] = 29;
    $outdata ['person']['isMarried'] = true;
    $outdata ['person']['gender'] = "female";

    return new JsonResponse ($outdata, Response::HTTP_OK);

  }

  // ********************************************************************************
  // **                                                                            **
  // ** function: getFamily                                                        **
  // **                                                                            **
  // ********************************************************************************
  /** 
   * @Route ("/getFamily", name="getFamily_api", methods={"POST"})
   */

  public function getFamily (Request $request): Response
  {
    $indata = json_decode ($request->getContent(), true);
    
#   $data['abc'] = $data['hello'];
#   $data ['xyz']['hugo'] = 'xyz';

#   $data = [
#     'hello' => "hello to Toms world",
#   ];
    if (! array_key_exists ('arg0', $indata))  {
      $outdata ['error'] = "person/arg0 not found";
      return new JsonResponse ($outdata, 422);

    } else if  (! array_key_exists ('firstname', $indata['arg0']))  {
      $outdata ['error'] = "person.firstname not found";
      return new JsonResponse ($outdata, 422);

    } else if  (! array_key_exists ('lastname', $indata['arg0']))  {
      $outdata ['error'] = "person.lastname not found";
      return new JsonResponse ($outdata, 422);

    } else if  (! array_key_exists ('age', $indata['arg0']))  {
      $outdata ['error'] = "person.age not found";
      return new JsonResponse ($outdata, 422);

    } else if  (! array_key_exists ('isMarried', $indata['arg0']))  {
      $outdata ['error'] = "person.isMarried not found";
      return new JsonResponse ($outdata, 422);

    } else if  (! array_key_exists ('gender', $indata['arg0']))  {
      $outdata ['error'] = "person.gender not found";
      return new JsonResponse ($outdata, 422);

    } else {

    $lastname = $indata['person']['lastname'];
    $outdata ['family']['size'] = 5;

    $outdata ['family']['members'][0]['firstname'] = 'Harry';
    $outdata ['family']['members'][0]['lastname'] = $lastname;
    $outdata ['family']['members'][0]['age'] = 40;
    $outdata ['family']['members'][0]['isMarried'] = true;
    $outdata ['family']['members'][0]['gender'] = "male";

    $outdata ['family']['members'][1]['firstname'] = 'Ginevra';
    $outdata ['family']['members'][1]['lastname'] = $lastname;
    $outdata ['family']['members'][1]['age'] = 39;
    $outdata ['family']['members'][1]['isMarried'] = true;
    $outdata ['family']['members'][1]['gender'] = "female";

    $outdata ['family']['members'][2]['firstname'] = 'James';
    $outdata ['family']['members'][2]['lastname'] = $lastname;
    $outdata ['family']['members'][2]['age'] = 16;
    $outdata ['family']['members'][2]['isMarried'] = false;
    $outdata ['family']['members'][2]['gender'] = "male";

    $outdata ['family']['members'][3]['firstname'] = 'Albus';
    $outdata ['family']['members'][3]['lastname'] = $lastname;
    $outdata ['family']['members'][3]['age'] = 14;
    $outdata ['family']['members'][3]['isMarried'] = false;
    $outdata ['family']['members'][3]['gender'] = "male";

    $outdata ['family']['members'][4]['firstname'] = 'Lily';
    $outdata ['family']['members'][4]['lastname'] = $lastname;
    $outdata ['family']['members'][4]['age'] = 12;
    $outdata ['family']['members'][4]['isMarried'] = false;
    $outdata ['family']['members'][4]['gender'] = "female";

    return new JsonResponse ($outdata, Response::HTTP_OK);
    } 

  }
}
