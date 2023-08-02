<?php

// Funkcja do wysyłania notyfikacji e-mail
function sendNotification($recipient, $subject, $message) {
    // Wprowadź kod do wysyłania notyfikacji e-mail, np. korzystając z funkcji mail()
    // np. mail($recipient, $subject, $message);
}

// Funkcja do przypisania użytkownika do pojazdu
function assignUserToVehicle($userId, $vehicleId) {
    // Wprowadź kod przypisania użytkownika do pojazdu, np. aktualizacja rekordu w bazie danych
    // np. UPDATE vehicles SET assigned_user_id = $userId WHERE id = $vehicleId;

    // Wysłanie notyfikacji do użytkownika
    $userEmail = "example.user@example.com"; // Tutaj podaj adres e-mail użytkownika
    $subject = "Pojazd przypisany";
    $message = "Twój użytkownik został przypisany do pojazdu o ID: $vehicleId.";
    sendNotification($userEmail, $subject, $message);

    // Wysłanie notyfikacji do administratora
    $adminEmail = "admin@example.com"; // Tutaj podaj adres e-mail administratora
    $adminSubject = "Przypisanie użytkownika do pojazdu";
    $adminMessage = "Użytkownik o ID: $userId został przypisany do pojazdu o ID: $vehicleId.";
    sendNotification($adminEmail, $adminSubject, $adminMessage);
}

// Funkcja do dezaktywacji użytkownika
function deactivateUser($userId) {
    // Wprowadź kod dezaktywacji użytkownika, np. aktualizacja rekordu w bazie danych
    // np. UPDATE users SET is_active = false WHERE id = $userId;

    // Wysłanie notyfikacji dezaktywowanemu użytkownikowi
    $userEmail = "example.user@example.com"; // Tutaj podaj adres e-mail użytkownika
    $subject = "Konto dezaktywowane";
    $message = "Twoje konto zostało dezaktywowane.";
    sendNotification($userEmail, $subject, $message);
}

// Przykład użycia funkcji

// Przypisanie użytkownika o ID 123 do pojazdu o ID 456
assignUserToVehicle(123, 456);

// Dezaktywacja użytkownika o ID 123
deactivateUser(123);

?>
