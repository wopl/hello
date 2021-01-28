<?php
// **********************************************************************************
// **                                                                              **
// ** Mainform.php                                  (c) Wolfram Plettscher 04/2018 **
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
  protected $travel_uuid;
  protected $date_start;
  protected $time_start;
  protected $km_start;
  protected $date_end;
  protected $time_end;
  protected $km_end;
  protected $distance;
  protected $route;
  protected $purpose;

  // ********************************************************************************
  // **                                                                            **
  // ** functions: getTravelUuid / setTravelUuid                                   **
  // **                                                                            **
  // ********************************************************************************
  public function getTravelUuid ()
  {
    return $this->travel_uuid;
  }

  public function setTravelUuid ($travel_uuid)
  {
    $this->travel_uuid = $travel_uuid;
  }

  // ********************************************************************************
  // **                                                                            **
  // ** functions: getDateStart / setDateStart                                     **
  // **                                                                            **
  // ********************************************************************************
  public function getDateStart ()
  {
    return $this->date_start;
  }

  public function setDateStart ($date_start)
  {
    $this->date_start = $date_start;
  }

  // ********************************************************************************
  // **                                                                            **
  // ** functions: getTimeStart / setTimeStart                                     **
  // **                                                                            **
  // ********************************************************************************
  public function getTimeStart ()
  {
    return $this->time_start;
  }

  public function setTimeStart ($time_start)
  {
    $this->time_start = $time_start;
  }
   
  // ********************************************************************************
  // **                                                                            **
  // ** functions: getKmStart / setKmStart                                         **
  // **                                                                            **
  // ********************************************************************************
  public function getKmStart ()
  {
    return $this->km_start;
  }

  public function setKmStart ($km_start)
  {
    $this->km_start = $km_start;
  }
   
  // ********************************************************************************
  // **                                                                            **
  // ** functions: getDateEnd / setDateEnd                                         **
  // **                                                                            **
  // ********************************************************************************
  public function getDateEnd ()
  {
    return $this->date_end;
  }

  public function setDateEnd ($date_end)
  {
    $this->date_end = $date_end;
  }

  // ********************************************************************************
  // **                                                                            **
  // ** functions: getTimeEnd / setTimeEnd                                         **
  // **                                                                            **
  // ********************************************************************************
  public function getTimeEnd ()
  {
    return $this->time_end;
  }

  public function setTimeEnd ($time_end)
  {
    $this->time_end = $time_end;
  }
   
  // ********************************************************************************
  // **                                                                            **
  // ** functions: getKmEnd / setKmEnd                                             **
  // **                                                                            **
  // ********************************************************************************
  public function getKmEnd ()
  {
    return $this->km_end;
  }

  public function setKmEnd ($km_end)
  {
    $this->km_end = $km_end;
  }
   
  // ********************************************************************************
  // **                                                                            **
  // ** functions: getRoute / setRoute                                             **
  // **                                                                            **
  // ********************************************************************************
  public function getRoute ()
  {
    return $this->route;
  }

  public function setRoute ($route)
  {
    $this->route = $route;
  }
   
  // ********************************************************************************
  // **                                                                            **
  // ** functions: getPurpose / setPurpose                                         **
  // **                                                                            **
  // ********************************************************************************
  public function getPurpose ()
  {
    return $this->purpose;
  }

  public function setPurpose ($purpose)
  {
    $this->purpose = $purpose;
  }
   
  // ********************************************************************************
  // **                                                                            **
  // ** functions: getDistance                                                     **
  // **                                                                            **
  // ********************************************************************************
  public function getDistance ()
  {
    return ($this->km_end - $this->km_start);
  }

  public function setDistance ($distance) {}

} // Mainform
