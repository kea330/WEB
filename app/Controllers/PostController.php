<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Repositories\PostRepositoryInterface;
use App\Validation\Validator;
use Core\Http\Request;
use Core\Http\Response;
use Core\View\Engine;

/**
 * Post CRUD - depends on PostRepositoryInterface, not SQLite directly (DIP).
 */
final class PostController
{
    public function __construct(
        private PostRepositoryInterface $posts,
        private Engine $view,
        private Request $request,
    ) {
    }

    public function index(): Response
    {
        $posts = $this->posts->findAll();

        return Response::html($this->view->render('posts/index', [
            'posts' => $posts,
        ]));
    }

    public function create(): Response
    {
        return Response::html($this->view->render('posts/create'));
    }

    public function store(): Response
    {
        $data = $this->request->all();
        $validator = new Validator();

        if (!$validator->validate($data, [
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:3',
        ])) {
            return Response::html($this->view->render('posts/create', [
                'errors' => $validator->errors(),
                'old' => $data,
            ]));
        }

        $this->posts->create([
            'title' => $data['title'],
            'body' => $data['body'],
        ]);

        return Response::redirect('/posts');
    }

    public function show(string $id): Response
    {
        $post = $this->posts->findById((int) $id);

        if ($post === null) {
            return Response::html('<h1>Post not found</h1>', 404);
        }

        return Response::html($this->view->render('posts/show', [
            'post' => $post,
        ]));
    }

    public function edit(string $id): Response
    {
        $post = $this->posts->findById((int) $id);

        if ($post === null) {
            return Response::html('<h1>Post not found</h1>', 404);
        }

        return Response::html($this->view->render('posts/edit', [
            'post' => $post,
        ]));
    }

    public function update(string $id): Response
    {
        $data = $this->request->all();
        $validator = new Validator();

        if (!$validator->validate($data, [
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:3',
        ])) {
            $post = $this->posts->findById((int) $id);
            return Response::html($this->view->render('posts/edit', [
                'post' => $post,
                'errors' => $validator->errors(),
            ]));
        }

        $this->posts->update((int) $id, [
            'title' => $data['title'],
            'body' => $data['body'],
        ]);

        return Response::redirect('/posts/' . $id);
    }

    public function destroy(string $id): Response
    {
        $this->posts->delete((int) $id);
        return Response::redirect('/posts');
    }
}

