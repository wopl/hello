<?php
// **********************************************************************************
// **                                                                              **
// ** MenuBuilder.php                               (c) Wolfram Plettscher 01/2021 **
// **                                                                              **
// **********************************************************************************
namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\Matcher\Matcher;
use Knp\Menu\Matcher\Voter\UriVoter;
use Knp\Menu\MenuFactory;
use Knp\Menu\Renderer\ListRenderer;
use Symfony\Component\HttpFoundation\RequestStack;

// **********************************************************************************
// **                                                                              **
// ** class: MenuBuilder                                                           **
// **                                                                              **
// **********************************************************************************
class MenuBuilder 
{
  private $factory;
  private $requestStack;

  // ********************************************************************************
  // **                                                                            **
  // ** function: __construct                                                      **
  // **                                                                            **
  // ********************************************************************************
  /**
   * @param FactoryInterface $factory
   *
   */
  public function __construct (FactoryInterface $factory, RequestStack $requestStack)
  {
    $this->factory = $factory;
    $this->requestStack = $requestStack;
  }

  // ********************************************************************************
  // **                                                                            **
  // ** function: createMainMenu                                                   **
  // **                                                                            **
  // ********************************************************************************
  public function createMainMenu ()
  {
    $menu = $this->factory->createItem ('root');

    $menu->addChild ('Home', array ('route' => 'gui'));

#    $menu['Login']->setCurrent (true);
    return $menu;
  }

  // ********************************************************************************
  // **                                                                            **
  // ** function: createMainMenu_old                                               **
  // **                                                                            **
  // ********************************************************************************
  public function createMainMenu_old (array $options)
  {
    $myuser = 'root';

    if ($myuser == 'root')
      $menu = $this->createRootMenu ();
    else
      $menu = $this->createUserMenu ();

    // now marking all parent menu items to active as well
    $request = $this->requestStack->getCurrentRequest();
    $routeName = $request->get('_route');

    switch ($routeName)
    {
      case 'travel':
        $menu['Time']->setCurrent(true);
        break;
      case 'projsel':
        $menu['Admin']->setCurrent(true);
        break;
      case 'tasks1':
        $menu['Tasks']->setCurrent(true);
        break;
      case 'kanban/backlog':
      case 'kanban/backlogtask':
      case 'kanban/inqueue':
      case 'kanban/wiptask':
        $menu['Tasks']->setCurrent(true);
        $menu['Tasks']['Kanban']->setCurrent(true);
        break;
    }
    
    return $menu;
  }

  // ********************************************************************************
  // **                                                                            **
  // ** function: createUserMenu                                                   **
  // **                                                                            **
  // ********************************************************************************
  private function createUserMenu ()
  {
    $menu = $this->factory->createItem ('root');

    $menu->addChild ('Home', array ('route' => 'homepage'));
    $menu->addChild ('Tasks', array ('route' => 'homepage'));
//    $menu['Tasks']->addChild ('ManageTasks', array ('route' => 'tasks1'));
//    $menu->addChild ('People', array ('route' => 'people'));
//    $menu['People']->addChild ('Project Team List', array ('route' => 'team'));
//    $menu['People']->addChild ('New Project Member', array ('route' => 'teamedit'));
//    $menu->addChild ('Time', array ('route' => 'time'));
//    $menu['Time']->addChild ('Travel', array ('route' => 'travel'));
//    $menu->addChild ('Admin', array ('route' => 'admin'));
//    $menu['Admin']->addChild ('change Password', array ('route' => 'passwd'));
//    $menu['Admin']->addChild ('Project Selection', array ('route' => 'projsel'));
//    $menu['Admin']->addChild ('User', array ('route' => 'user'));
//    $menu['Admin']->addChild ('Impressum', array ('route' => 'impressum'));
//    $menu->addChild ('Logout', array ('route' => 'logout'));
//    $menu->addChild ('Test', array ('route' => 'test1'));
//    $menu['Test']->addChild ('TestSub', array ('route' => 'test2'));
//    $menu['TestSub']->addChild ('TestSubSub', array ('route' => 'test3'));

    $menu['Tasks']->addChild ('ManageTasks', array ('route' => 'homepage'));
    $menu->addChild ('People', array ('route' => 'homepage'));
    $menu['People']->addChild ('Project Team List', array ('route' => 'homepage'));
    $menu['People']->addChild ('New Project Member', array ('route' => 'homepage'));
    $menu->addChild ('Time', array ('route' => 'homepage'));
    $menu['Time']->addChild ('Travel', array ('route' => 'homepage'));
    $menu->addChild ('Admin', array ('route' => 'homepage'));
    $menu['Admin']->addChild ('change Password', array ('route' => 'homepage'));
    $menu['Admin']->addChild ('Project Selection', array ('route' => 'projsel'));
    $menu['Admin']->addChild ('User', array ('route' => 'homepage'));
    $menu['Admin']->addChild ('Impressum', array ('route' => 'impressum'));
    $menu->addChild ('Logout', array ('route' => 'logout'));
    $menu->addChild ('Test', array ('uri' => '#'));

    // Level 2 menu gets a bit more tricky, see below example
    // $menutest1 = $menu['Test']->addChild ('TestSub', array ('route' => 'homepage'));
    // $menutest1->addChild ('TestSubSub', array ('route' => 'homepage'));

    return $menu;
  }

  // ********************************************************************************
  // **                                                                            **
  // ** function: createRootMenu                                                   **
  // **                                                                            **
  // ********************************************************************************
  private function createRootMenu ()
  {
    $menu = $this->factory->createItem ('root');

    $menu->addChild ('HomeRoot', array ('route' => 'homepage'));

    //*** Tasks ***
    $menu->addChild ('Tasks');
    $menu['Tasks']->addChild ('Manage Tasks', array ('route' => 'tasks1'));

    $menukanban = $menu['Tasks']->addChild ('Kanban', array ('route' => 'kanban/backlog'));
    $menukanban->addChild ('Backlog', array ('route' => 'kanban/backlog'));
    $menukanban->addChild ('Input Queue', array ('route' => 'kanban/inqueue'));
    $menukanban->addChild ('WiP Tasks', array ('route' => 'kanban/wiptask'));

    $menu->addChild ('People');
//  $menu['People']->addChild ('Project Team List', array ('route' => 'team'));
//  $menu['People']->addChild ('New Project Member', array ('route' => 'teamedit'));

    $menu->addChild ('Time');
    $menu['Time']->addChild ('Travel', array ('route' => 'travel'));

    $menu->addChild ('Matrices');
    $menu['Matrices']->addChild ('Lists', array ('route' => 'nestlist'));

    $menu->addChild ('Admin');
//  $menu['Admin']->addChild ('change Password', array ('route' => 'passwd'));
    $menu['Admin']->addChild ('Project Selection', array ('route' => 'projsel'));
//  $menu['Admin']->addChild ('User', array ('route' => 'user'));
//    $menu['Admin']->addChild ('Impressum', array ('route' => 'impressum'));
//    $menu['Admin']['User']->addChild ('Test');
    $menu->addChild ('Logout', array ('route' => 'logout'));

    return $menu;
  }

  // ********************************************************************************
  // **                                                                            **
  // ** function: createLoginMenu                                                  **
  // **                                                                            **
  // ********************************************************************************
  public function createLoginMenu ()
  {
    $menu = $this->factory->createItem ('root');

    $menu->addChild ('Login', array ('route' => 'login'));
    $menu->addChild ('Register', array ('route' => 'register'));
    $menu->addChild ('Privacy Policy', array ('route' => 'privacy'));
    $menu->addChild ('Impressum', array ('route' => 'impressum'));

#    $menu['Login']->setCurrent (true);
    return $menu;
  }

}
