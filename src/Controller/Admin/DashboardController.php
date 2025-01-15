<?php

namespace App\Controller\Admin;

use App\Entity\Dish;
use App\Entity\Menu;
use App\Entity\User;
use App\Entity\Images;
use App\Entity\Allergy;
use App\Entity\Category;
use App\Entity\Formulas;
use App\Entity\Restaurant;
use App\Entity\OpeningHours;
use App\Entity\Reservation;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Ecf Quai Antique');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Allergy', 'fas fa-biohazard', Allergy::class);
        yield MenuItem::linkToCrud('Category', 'fab fa-red-river', Category::class);
        yield MenuItem::linkToCrud('Dish', 'fas fa-utensils', Dish::class);
        yield MenuItem::linkToCrud('Formulas', 'fas fa-cookie-bite', Formulas::class);
        yield MenuItem::linkToCrud('OpeningHours', 'fas fa-hourglass-empty', OpeningHours::class);
        yield MenuItem::linkToCrud('Images', 'fas fa-images', Images::class);
        yield MenuItem::linkToCrud('Reservation', 'fas fa-images', Reservation::class);
        yield MenuItem::linkToCrud('Restaurant', 'fab fa-rebel', Restaurant::class);
        yield MenuItem::linkToCrud('User', 'fas fa-user-astronaut', User::class);
    }
}
