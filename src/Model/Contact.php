<?php
namespace App\Model;

use App\Service\Config;

class Contact
{
    private ?int $id = null;
    private ?string $firstName = null;
    private ?string $lastName = null;
    private ?string $email = null;
    private ?string $phone = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): Contact
    {
        $this->id = $id;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): Contact
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): Contact
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): Contact
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): Contact
    {
        $this->phone = $phone;

        return $this;
    }

    public static function fromArray($array): Contact
    {
        $contact = new self();
        $contact->fill($array);

        return $contact;
    }

    public function fill($array): Contact
    {
        if (isset($array['id']) && !$this->getId()) {
            $this->setId($array['id']);
        }
        if (isset($array['first_name'])) {
            $this->setFirstName($array['first_name']);
        }
        if (isset($array['last_name'])) {
            $this->setLastName($array['last_name']);
        }
        if (isset($array['email'])) {
            $this->setEmail($array['email']);
        }
        if (isset($array['phone'])) {
            $this->setPhone($array['phone']);
        }

        return $this;
    }

    public static function findAll(): array
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM contact';
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $contacts = [];
        $contactsArray = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($contactsArray as $contactArray) {
            $contacts[] = self::fromArray($contactArray);
        }

        return $contacts;
    }

    public static function find($id): ?Contact
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM contact WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->execute(['id' => $id]);

        $contactArray = $statement->fetch(\PDO::FETCH_ASSOC);
        if (!$contactArray) {
            return null;
        }
        $contact = Contact::fromArray($contactArray);

        return $contact;
    }

    public function save(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        if (!$this->getId()) {
            $sql = "INSERT INTO contact (first_name, last_name, email, phone) VALUES (:first_name, :last_name, :email, :phone)";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                'first_name' => $this->getFirstName(),
                'last_name' => $this->getLastName(),
                'email' => $this->getEmail(),
                'phone' => $this->getPhone(),
            ]);

            $this->setId($pdo->lastInsertId());
        } else {
            $sql = "UPDATE contact SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone WHERE id = :id";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                ':first_name' => $this->getFirstName(),
                ':last_name' => $this->getLastName(),
                ':email' => $this->getEmail(),
                ':phone' => $this->getPhone(),
                ':id' => $this->getId(),
            ]);
        }
    }

    public function delete(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = "DELETE FROM contact WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            ':id' => $this->getId(),
        ]);
    }
}

