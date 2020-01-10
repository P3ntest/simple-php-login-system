<div id="err_code">
<?php
  session_start();
  if (isset($_SESSION['err_code_login'])) {
      echo $_SESSION['err_code_login'];
      unset($_SESSION['err_code_login']);
  }
 ?>
</div>
<form action="/login/login_action.php" method="post">
  <div class="container">
    <input type="text" placeholder="Enter Username" name="username" required>
      <br>
    <input type="password" placeholder="Enter Password" name="password" required>
      <br>
    <button type="submit">Login</button>
  </div>
</form>
<br>
Don't have an account yet? Register nów!

<a href="/register"><button>Register</button></a>
