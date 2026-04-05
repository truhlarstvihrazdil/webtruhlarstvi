<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jmeno = htmlspecialchars(trim($_POST["jmeno"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $zprava = htmlspecialchars(trim($_POST["zprava"]));

    $komu = "truhlarstvihrazdil@seznam.cz"; // Změň na svůj e-mail
    $predmet = "Zpráva z kontaktního formuláře";
    $hlavicka = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";

    $text = "Jméno: $jmeno\nE-mail: $email\n\nZpráva:\n$zprava";

    if (mail($komu, $predmet, $text, $hlavicka)) {
        echo "<p style='font-family:sans-serif;'>Děkujeme, zpráva byla úspěšně odeslána.</p>";
    } else {
        echo "<p style='font-family:sans-serif; color: red;'>Došlo k chybě při odesílání zprávy. Zkuste to prosím později.</p>";
    }
} else {
    header("Location: index.html");
    exit;
}
?>
