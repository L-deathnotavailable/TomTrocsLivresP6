<?php

class Message extends AbstractEntity
{
    private string $content;
    private ?\DateTime $readAt;
    private int $idSender;
    private int $idRecipient;
    private ?string $userImage; //not saved in db
    private ?string $username;

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getReadAt(): ?DateTime
    {
        return $this->readAt;
    }

    public function setReadAt(?string $readAt, string $format = 'Y-m-d H:i:s'): void
    {
        if ($readAt !== null) {
            $this->readAt = DateTime::createFromFormat($format, $readAt);
        } else {
            $this->readAt = null;
        }
    }

    public function setIdSender(int $idSender): void
    {
        $this->idSender = $idSender;
    }

    public function getIdSender(): int
    {
        return $this->idSender;
    }

    public function getIdRecipient(): int
    {
        return $this->idRecipient;
    }

    public function setIdRecipient(int $idRecipient): void
    {
        $this->idRecipient = $idRecipient;
    }

    public function setUserImage(?string $image){
        $this->userImage = $image;
    }
    public function getUserImage(){
        return $this->userImage ?? 'default.png';
    }
    public function setUsername(string $username): void {
        $this->username = $username;
    }
    
    public function getUsername(): string {
        return $this->username ?? 'Utilisateur inconnu';
    }
}
