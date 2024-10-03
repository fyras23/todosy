<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorController extends AbstractController
{
    
    #[Route('/author/{name}', name: 'author_show"')]
    public function showAuthor(string $name): Response
    {
        
        return $this->render('author/show.html.twig', [
            'name' => $name,
        ]);
    }

    private $authors = [
        1 => [
            'id' => 1,
            'picture' => '/images/Victor-Hugo.jpg',
            'username' => 'Victor Hugo',
            'email' => 'victor.hugo@esprit.tn',
            'nb_books' => 100
        ],
        2 => [
            'id' => 2,
            'picture' => '/images/william-shakespeare.jpg',
            'username' => 'William Shakespeare',
            'email' => 'william.shakespeare558@gmail.com',
            'nb_books' => 200
        ],
        3 => [
            'id' => 3,
            'picture' => '/images/Taha_Hussein.jpg',
            'username' => 'Taha Hussein',
            'email' => 'taha.hussein01@gmail.com',
            'nb_books' => 300
        ],
        4 => [
            'id' => 4,
            'picture' => '/images/karim benzema.jpg',
            'username' => 'karim benzima',
            'email' => 'karimbenzima@gmail.com',
            'nb_books' => 100
        ],
        5 => [
            'id' => 5,
            'picture' => '/images/elon musk.jpg',
            'username' => 'Elon Musk',
            'email' => 'elonmusk23@gmail.com',
            'nb_books' => 52
        ],
        6 => [
            'id' => 6,
            'picture' => '/images/George R. R. Martin.jpg',
            'username' => 'George R. R. Martin',
            'email' => 'elonmusk23@gmail.com',
            'nb_books' => 3
        ],
        
        
    ];

    #[Route('/authors', name: 'author_list')]
    public function listAuthors(): Response
    {
       
        $authors = $this->authors;

      
        if (empty($authors)) {
            $totalBooks = 0;
            $authorCount = 0;
        } else {
          
            $totalBooks = array_sum(array_column($authors, 'nb_books'));
            $authorCount = count($authors);
        }

     
        return $this->render('author/list.html.twig', [
            'authors' => $authors,
            'authorCount' => $authorCount,
            'totalBooks' => $totalBooks,
        ]);
    }


    #[Route('/authors/{id}', name: 'authorDetails')]
    public function authorDetails(int $id): Response
    {
        $authors = $this->authors;
        if (!isset($this->authors[$id])) {
            throw $this->createNotFoundException('Author not found');
        }

        
        $author = $this->authors[$id];

       
        return $this->render('author/showAuthor.html.twig', [
            'author' => $author,
        ]);
    }
}
