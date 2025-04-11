<?php

class ChatController {
    public function showChat() {

        $userId = $this->checkIfUserIsConnected();
        $receiverId = Utils::request("receiverId", -1);

        $messageManager = new MessageManager();
        $messageManager->markMessagesAsRead($receiverId, $userId);
        $messages = $messageManager->getMessageByRecipientAndSender($receiverId,$userId);
        $lastMessages = $messageManager->getAllLastMessagesToUser($userId);
        $view = new View('Chat');
        $contact = null;
        if ($receiverId > 0) {
            $contact = $messageManager->getContact($receiverId);
        }
        $unreadCount = $messageManager->CountUnreadMessages($userId);
        $_SESSION['unreadCount'] = $unreadCount;
        $view->render('ChatShow', [
            'lastMessages' => $lastMessages,
            'messages' => $messages,
            'userId' => $userId,
            'receiverId' => $receiverId,
            'contact' => $contact,
            'unreadCount' => $unreadCount
        ]);
    }
    public function sendMessage() {
        $userId = $this->checkIfUserIsConnected();

        $receiverId = Utils::request("receiverId", -1);

        $message = new Message([
            'content' => htmlspecialchars(Utils::request("message")),
            'id_sender' => $userId,
            'id_recipient' => $receiverId,
            'creation_date' => new DateTime(),
        ]);
        $messageManager = new MessageManager();
        $messageManager->insertMessage($message);

        $this->showChat();

    }
    private function checkIfUserIsConnected(): ?int
    {
        if (!isset($_SESSION['user'])) {
            Utils::redirect("showConnexion");
        }
        return $_SESSION['idUser'];
    }
}
