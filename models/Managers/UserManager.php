<?php
class UserManager extends AbstractEntityManager
{
    public function addUser(User $user): void
    {
        $statement = "INSERT INTO users (username, email, password, account_picture, creation_date) VALUES (:username, :email, :password, :account_picture, :creation_date)";

        $this->db->query($statement,
            [
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'account_picture' => $user->getAccountPicture(),
                'creation_date' => $user->getCreationDateString()
            ]);
    }
    public function userExists($username, $email): bool
    {
        $statement = "SELECT COUNT(*) FROM users WHERE username = :username OR email = :email";

        $result = $this->db->query($statement,
            [
                'username' => $username,
                'email' => $email
            ]);

        return $result->fetchColumn() > 0;
    }
}