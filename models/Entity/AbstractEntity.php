<?php

abstract class AbstractEntity 
{
    // Par défaut l'id vaut -1, ce qui permet de vérifier facilement si l'entité est nouvelle ou pas. 
    protected int $id = -1;
    protected ?DateTime $creationDate = null;

    /**
     * Constructeur de la classe.
     * Si un tableau associatif est passé en paramètre, on hydrate l'entité.
     * 
     * @param array $data
     */
    public function __construct(array $data = []) 
    {
        if (!empty($data)) {
            $this->hydrate($data);
        }
    }

    /**
     * Système d'hydratation de l'entité.
     * Permet de transformer les données d'un tableau associatif.
     * Les noms de champs de la table doivent correspondre aux noms des attributs de l'entité.
     * Les underscore sont transformés en camelCase (ex: date_creation devient setDateCreation).
     * @return void
     */
    protected function hydrate(array $data) : void 
    {
        foreach ($data as $key => $value) {
            $method = 'set' . str_replace('_', '', ucwords($key, '_'));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /** 
     * Setter pour l'id.
     * @param int $id
     * @return void
     */
    public function setId(int $id) : void 
    {
        $this->id = $id;
    }

    /**
     * Getter pour l'id.
     * @return int
     */
    public function getId() : int 
    {
        return $this->id;
    }

    public function getCreationDateString($format='Y-m-d H:i:s'): string
    {
        return $this->creationDate ? $this->creationDate->format($format) : 'Date inconnue';
    }
    public function getCreationDate() : DateTime {
        return $this->creationDate;
    }
    public function setCreationDate($creationDate): void {
        if (is_string($creationDate) && !empty($creationDate)) {
            $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $creationDate);
            $this->creationDate = $dateTime ?: null; // Si la conversion échoue, on met null
        } elseif ($creationDate instanceof DateTime) {
            $this->creationDate = $creationDate;
        } 
    }

    public function getListDateString(): string {
        $now = new \DateTime();
        $creationDate = $this->getCreationDate(); // Assure-toi que c’est un DateTime
    
        if ($now->format('Y-m-d') === $creationDate->format('Y-m-d')) {
            // Si le message est d'aujourd'hui → heure hh:mm
            return $creationDate->format('H:i');
        } else {
            // Sinon → date jj.mm
            return $creationDate->format('d.m');
        }
    }
}