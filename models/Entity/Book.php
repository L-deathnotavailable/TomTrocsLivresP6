<?php

class Book extends AbstractEntity
{
    private string $title;
    private string $author;
    private string $description;
    private ?string $image = null;
    private bool $available;
    private int $sellerId;
    private string $sellerName;
    private ?string $accountPicture = null;

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setAvailable(bool $available): void
    {
        $this->available = $available;
    }

    public function getAvailable(): bool
    {
        return (bool) $this->available;
    }

    public function getSellerId(): int
    {
        return $this->sellerId;
    }

    public function setSellerId(int $sellerId): void
    {
        $this->sellerId = $sellerId;
    }


    public function setSellerName(string $sellerName): void
    {
        $this->sellerName = $sellerName;
    }

    public function getSellerName(): string
    {
        return $this->sellerName ?? 'Vendeur inconnu';
    }

    public function getAccountPicture(): ?string
    {
        return $this->accountPicture;
    }

    public function setAccountPicture(string $accountPicture): void
    {
        $this->accountPicture = $accountPicture ?? 'default.png'; // Met une image par défaut si NULL
    }

    public function getShortDescription(int $length = 100): string {
        $desc = $this->description ?? '';
        return strlen($desc) > $length ? substr($desc, 0, $length) . '...' : $desc;
    }

}