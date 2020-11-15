<?php
// **********************************************************************************
// **                                                                              **
// ** HelloController.php                           (c) Wolfram Plettscher 11/2020 **
// **                                                                              **
// **********************************************************************************

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

// **********************************************************************************
// **                                                                              **
// ** class: HelloController                                                       **
// **                                                                              **
// **********************************************************************************
class HelloController extends AbstractController
{

  // ********************************************************************************
  // **                                                                            **
  // ** function: hello                                                            **
  // **                                                                            **
  // ********************************************************************************
  public function hello(): Response
  {
    return new Response (
      '<html><body>Hello my Container World</body></html>'
    );
  }

}
