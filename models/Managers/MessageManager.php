<?php
class MessageManager extends AbstractEntityManager {
    public function getMessageByRecipientAndSender (int $senderId, int $recipientId): array{

        $sql = "SELECT messages.*, 
         sender.account_picture AS sender_picture, sender.username AS sender_name
         from messages
         JOIN users AS sender ON sender.id = messages.id_sender
         WHERE id_sender = :id_sender AND id_recipient = :id_recipient OR id_sender = :id_recipient AND id_recipient = :id_sender
         ORDER BY creation_date ASC";

        $result = $this->db->query($sql, ['id_sender' => $senderId, 'id_recipient' => $recipientId]);

        $messages = [];
        while ($message = $result->fetch()) {
            $message_db= new Message($message);
            $otherUserImage = $message['sender_picture'];
            $message_db->setUserImage($otherUserImage);
            $messages[] = ($message_db);
        }
        return $messages;
    }

    public function getAllLastMessagesToUser(int $userId): array {
        $sql = "SELECT messages.*, 
                       sender.account_picture AS sender_picture, sender.username AS sender_name, 
                       recipient.account_picture AS recipient_picture, recipient.username AS recipient_name
                FROM messages
                JOIN users AS sender ON sender.id = messages.id_sender
                JOIN users AS recipient ON recipient.id = messages.id_recipient
                WHERE id_recipient = :user_id OR id_sender = :user_id
                ORDER BY creation_date DESC";
    
        $result = $this->db->query($sql, ['user_id' => $userId])->fetchAll();
    
        $lastMessages = [];
        foreach ($result as $message) {
            $senderId = $message['id_sender'];
            $recipientId = $message['id_recipient'];
            
            // Déterminer l'autre utilisateur (celui avec qui on discute)
            if ($userId === $senderId) {
                $otherUserId = $recipientId;
                $otherUsername = $message['recipient_name'];
                $otherUserImage = $message['recipient_picture'];
            } else {
                $otherUserId = $senderId;
                $otherUsername = $message['sender_name'];
                $otherUserImage = $message['sender_picture'];
            }
    
            // Vérifier si la conversation avec cet utilisateur a déjà été ajoutée
            if (!isset($lastMessages[$otherUserId])) {
                $msg = new Message($message);
                $msg->setUserImage($otherUserImage);
                $msg->setUsername($otherUsername);
                $lastMessages[$otherUserId] = $msg;
            }
        }
        return $lastMessages;
    }

    public function insertMessage(Message $message): void{
        $sql = "INSERT INTO messages (content, id_sender, id_recipient) VALUES (:content, :id_sender, :id_recipient)";
        $this->db->query($sql, [
            'content' => $message->getContent(),
            'id_sender' => $message->getIdSender(),
            'id_recipient' => $message->getIdRecipient()
        ]);
    }
    public function CountUnreadMessages(int $id_recipient): int {
        $sql = "SELECT COUNT(*) AS CountMessage 
                FROM messages 
                WHERE id_recipient = :id_recipient 
                AND read_date IS NULL";
                
        $result = $this->db->query($sql, ['id_recipient' => $id_recipient]);
        return $result->fetch()['CountMessage'];
    }
    public function getContact(int $id): ?array {
        $sql = "SELECT username, account_picture FROM users WHERE id = :id";
        $stmt = $this->db->query($sql, ['id' => $id]);
        $result = $stmt->fetch();
    
        return $result ?: null;
    }
    public function markMessagesAsRead(int $senderId, int $recipientId): void {
        $sql = "UPDATE messages 
                SET read_date = NOW() 
                WHERE id_sender = :senderId 
                AND id_recipient = :recipientId 
                AND read_date IS NULL";
    
        $this->db->query($sql, [
            'senderId' => $senderId,
            'recipientId' => $recipientId
        ]);
    }
}