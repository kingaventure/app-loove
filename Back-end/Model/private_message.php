<?php

function getConversation($pdo, $userId1, $userId2) {
    $stmt = $pdo->prepare("
        SELECT * FROM messages
        WHERE (sender_id = :u1 AND receiver_id = :u2)
           OR (sender_id = :u2 AND receiver_id = :u1)
        ORDER BY sent_at ASC
    ");
    $stmt->bindParam(':u1', $userId1, PDO::PARAM_INT);
    $stmt->bindParam(':u2', $userId2, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function sendMessage($pdo, $senderId, $receiverId, $content) {
    $stmt = $pdo->prepare("
        INSERT INTO messages (sender_id, receiver_id, content) 
        VALUES (:sender, :receiver, :content)
    ");
    $stmt->bindParam(':sender', $senderId, PDO::PARAM_INT);
    $stmt->bindParam(':receiver', $receiverId, PDO::PARAM_INT);
    $stmt->bindParam(':content', $content, PDO::PARAM_STR);
    return $stmt->execute();
}