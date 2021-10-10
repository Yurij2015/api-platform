<?php

namespace App\Controller\Admin;

use App\Entity\ApplicationForm;
use App\Entity\ObjectInAppForm;
use App\Entity\Product;
use App\Entity\Service;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Customer;
use App\Entity\Order;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
//        return parent::index();
        $routerBuilder = $this->get(AdminUrlGenerator::class);
        $url = $routerBuilder->setController(CustomerCrudController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Myapp');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Customers', 'fas fa-list-alt', Customer::class);
        yield MenuItem::linkToCrud('Orders', 'fa fa-code', Order::class);
        yield MenuItem::linkToCrud('Services', 'fa fa-bars', Service::class);
        yield MenuItem::linkToCrud('Products', 'fa fa-bars', Product::class);
        yield MenuItem::linkToCrud('Applications', 'fa fa-bars', ApplicationForm::class);
        yield MenuItem::linkToCrud('ObjectInAppForm.php', 'fa fa-bars', ObjectInAppForm::class);

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
