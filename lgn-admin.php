<?php
session_start();
include 'koneksi_db.php';

$error = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM login_admin WHERE username='$username'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        if ($password === $data['password']) {
            $_SESSION['admin'] = $data['username'];
            header("Location: beranda_admin.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>
<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Login Admin</title>

  <style>
    :root {
      --bg: #1f2a36;
      --card: #2f3f4b;
      --accent: #00a4ff;
      --muted: #c7d6e0;
    }

    body {
      margin: 0;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(180deg, #12202a, #23364a);
      font-family: system-ui, Segoe UI, Roboto, Arial;
      color: #fff;
    }

    .card {
      width: 360px;
      background: rgba(255, 255, 255, 0.05);
      padding: 28px;
      border-radius: 14px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    }

    .field {
      margin-bottom: 16px;
    }

    .input-wrap {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 12px;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .input-wrap input {
      flex: 1;
      background: transparent;
      border: none;
      color: #fff;
      font-size: 15px;
      outline: none;
    }

    .input-wrap svg {
      width: 20px;
      height: 20px;
      flex-shrink: 0;
    }

    .toggle-btn {
      cursor: pointer;
    }

    .btn {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 10px;
      background: linear-gradient(180deg, var(--accent), #0074d9);
      color: #04202a;
      font-weight: bold;
      cursor: pointer;
    }

    .error {
      color: #ff7a7a;
      text-align: center;
      margin-bottom: 12px;
    }
  </style>
</head>

<body>

  <main class="card">
    <h1 style="text-align:center;margin-bottom:18px;">Login Admin</h1>

    <?php if ($error != "") { ?>
      <div class="error"><?php echo $error; ?></div>
    <?php } ?>

    <form method="POST">

  
      <div class="field">
        <div class="input-wrap">
        
          <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5Zm0 2c-4 0-8 2-8 5v1h16v-1c0-3-4-5-8-5Z"/>
          </svg>

          <input type="text" name="username" placeholder="Username Admin" required>
        </div>
      </div>

      
      <div class="field">
        <div class="input-wrap">

          
          <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path d="M17 11V8a5 5 0 1 0-10 0v3M5 11h14v10H5Z"/>
          </svg>

          <input type="password" name="password" id="password" placeholder="Password" required>

          
          <svg id="togglePass" class="toggle-btn" fill="none" stroke="currentColor" stroke-width="1.5"
            viewBox="0 0 24 24">
            <path id="eyeIcon" d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12Zm11-4a4 4 0 1 1 0 8 4 4 0 0 1 0-8Z"/>
          </svg>

        </div>
      </div>

      <button class="btn" type="submit" name="login">LOGIN</button>

    </form>
  </main>

  <script>
    const pass = document.getElementById("password");
    const toggle = document.getElementById("togglePass");
    const eye = document.getElementById("eyeIcon");

    toggle.addEventListener("click", () => {
      if (pass.type === "password") {
        pass.type = "text";

        
        eye.setAttribute("d",
          "M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12Zm11-2a2 2 0 1 1 0 4 2 2 0 0 1 0-4Z"
        );

      } else {
        pass.type = "password";

        
        eye.setAttribute("d",
          "M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12Zm11-4a4 4 0 1 1 0 8 4 4 0 0 1 0-8Z"
        );
      }
    });
  </script>

</body>
</html>
