<?php
if (isset($_POST['nickname'])&& !empty($_POST['nickname'])) {
  setcookie('nickname', $_POST['nickname']);
}

require_once(__DIR__."/connection.php");
include './recuperation_donnees/insert_sms.php';
//message
$stmt1 = $pdo->prepare("SELECT * FROM user JOIN message ON user.id = message.user_id ORDER BY created_at ASC");
$stmt1->execute(); 
$result1 = $stmt1->fetchAll();
//users
$stmt2 = $pdo->prepare("SELECT nickname FROM user");
$stmt2->execute(); 
$result2 = $stmt2->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>chat</title>
</head>
<body>
<div class='container'>
<div class='item1'>
<h1>Chats</h1>
</div>

<div class='item2'>
<p>Utilisateurs<p>
<?php 
foreach($result2 as $user) 
{ ?>
<p><?=$user['nickname']?></p>
<?php }
?>

</div>
<div class='item3'>
<p>Messages</p>
<table class="table">
<thead>
    <tr>
    <th>Pseudo</th>
    <th>message</th>
    <th>date</th>
                
    </tr>
</thead>
<tbody>
<?php 
foreach($result1 as $sms) 
{ ?>
<tr>
<td><?=$sms['nickname']?></td>
<td><?=$sms['message']?></td>
<td><?=$sms['created_at']?></td>
</tr>
<?php }
?>
</tbody>
</table>
</div>


    <div class='item4'>
        <form action='index.php' method='post'>
   
                <label for='nickname'>Pseudo</label>
                <input type='text' class='form-control' name='nickname' required value="<?=$_COOKIE["nickname"]?>">
        
        
                <label for='message' >Message</label>
                <input type='text' class='form-control' name='message' required placeholder="message">
  
                <button class='btn btn-primary' type='submit'>Send</button>
        </form>
    </div>
</div>
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js' integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>    
</body>
</html>
