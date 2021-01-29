<?php
// **********************************************************************************
// **                                                                              **
// ** Mainform.php                                  (c) Wolfram Plettscher 01/2021 **
// **                                                                              **
// **********************************************************************************
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use \PDO;
use App\Entity\Database;
use Symfony\Component\HttpFoundation\Session\Session;

// **********************************************************************************
// **                                                                              **
// ** class: Mainform                                                              **
// **                                                                              **
// **********************************************************************************
class Mainform
{

  // ******************************************************************************** 
  // *** define all database/form fields
  /**
   * @Assert\NotBlank()
   */
  protected $string;
  protected $oldstring;

  // ********************************************************************************
  // **                                                                            **
  // ** functions: getString / setString                                           **
  // **                                                                            **
  // ********************************************************************************
  public function getString ()
  {
    return $this->string;
  }

  public function setString ($string)
  {
    $this->string = $string;
  }

  // ********************************************************************************
  // **                                                                            **
  // ** functions: getOldstring / setOldstring                                     **
  // **                                                                            **
  // ********************************************************************************
  public function getOldstring ()
  {
    return $this->oldstring;
  }

  public function setOldstring ($myoldstring)
  {
    $this->oldstring = $myoldstring;
  }
}
