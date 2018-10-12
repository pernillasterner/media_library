<?php

// 1. Kollar om det metoden POST finns i SERVER['REQUEST_METHOD']
// 2. Validera koden som finns med i post
// 3. Kolla om POST innehåller en tom sträng
// 4. Address kommer jag inte ihåg
// 5. Spara alla uppgifter i en variabel
// 6. Ladda om sidan och lägg till thanks som GET tagg för att aktivera thanks you for emailen meddelandet.
// 7. Skriv ut formuläret om ingen POST är skickad.
// 8. Formuläret skickas till samma sida.


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
  $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
  $details = trim(filter_input(INPUT_POST, 'details', FILTER_SANITIZE_SPECIAL_CHARS));

  if ($name == '' || $email == '' || $details == '') {
    echo "Please fill in the requires fields: Name, Email and Details";
    exit;
  }

  if ($_POST['address'] != '') {
    echo 'Bad form input';
    exit;
  }

  $email_body = "";
  $email_body .= "Name " . $name . "\n";
  $email_body .= "Email " . $email . "\n";
  $email_body .= "Details " . $details . "\n";
  $email_body;

  // To do: Send email!

  header('Location:suggest.php?status=thanks');
}


$pageTitle = 'Suggest a Media Item';
$section = 'suggest';

include('inc/header.php'); ?>

<div class="section page">
  <div class="wrapper">
    <h1>Suggest a media item.</h1>
    <?php
    if (isset($_GET['status']) && $_GET['status'] == 'thanks') {
        echo '<p>Thank for the email! I&rsquo;ll check out your suggestion shortley!</p>';
    } else {
    ?>
    <p>If you think there is something I&rsquo;m missing, let me know! Complete the form to send me an email.</p>

    <form class="" action="suggest.php" method="post">
      <table>
        <tr>
          <th><label for="name">Name</label></th>
          <td><input type="text" id="name" name="name" value=""></td>
        </tr>
        <tr style="display:none;">
          <th><label for="address">Address</label></th>
          <td><input type="text" id="address" name="address" value="">
          <p>Please leave this form blank</p></td>
        </tr>
        <tr>
          <th><label for="email">Email</label></th> <!-- for have to match the id -->
          <td><input type="text" id="email" name="email" value=""></td>
        </tr>
        <tr>
          <th><label for="details">Suggest Item Details.</label></th>
          <td><textarea name="details" id="details" rows="8" cols="80"></textarea></td>
        </tr>
      </table>
      <input type="submit" name="" value="Send">
    </form>
  <?php } ?>
  </div>

</div>
<?php include('inc/footer.php'); ?>
