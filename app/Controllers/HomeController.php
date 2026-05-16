<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Repositories\PostStatsRepository;
use Core\Http\Response;
use Core\View\Engine;

final class HomeController
{
    public function __construct(
        private Engine $view,
        private PostStatsRepository $stats,
    ) {
    }

    public function index(): Response
    {
        $html = $this->view->render('home/index', [
            'title' => 'Welcome',
            'postCount' => $this->stats->count(),
        ]);

        return Response::html($html);
    }
}

