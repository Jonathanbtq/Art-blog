<?php

namespace App\Entity;

use App\Repository\AboutRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AboutRepository::class)]
class About
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pseudo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $domaine_list = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $birthday_date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $location = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $birthday_blog = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $favorite_game = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $favorite_books = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $favorite_movies = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getDomaineList(): ?string
    {
        return $this->domaine_list;
    }

    public function setDomaineList(?string $domaine_list): self
    {
        $this->domaine_list = $domaine_list;

        return $this;
    }

    public function getBirthdayDate(): ?\DateTimeInterface
    {
        return $this->birthday_date;
    }

    public function setBirthdayDate(?\DateTimeInterface $birthday_date): self
    {
        $this->birthday_date = $birthday_date;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getBirthdayBlog(): ?\DateTimeInterface
    {
        return $this->birthday_blog;
    }

    public function setBirthdayBlog(?\DateTimeInterface $birthday_blog): self
    {
        $this->birthday_blog = $birthday_blog;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getFavoriteGame(): ?string
    {
        return $this->favorite_game;
    }

    public function setFavoriteGame(?string $favorite_game): self
    {
        $this->favorite_game = $favorite_game;

        return $this;
    }

    public function getFavoriteBooks(): ?string
    {
        return $this->favorite_books;
    }

    public function setFavoriteBooks(?string $favorite_books): self
    {
        $this->favorite_books = $favorite_books;

        return $this;
    }

    public function getFavoriteMovies(): ?string
    {
        return $this->favorite_movies;
    }

    public function setFavoriteMovies(?string $favorite_movies): self
    {
        $this->favorite_movies = $favorite_movies;

        return $this;
    }
}
