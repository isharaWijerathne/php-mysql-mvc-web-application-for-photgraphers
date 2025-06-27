<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <?php
    require("../../include/cdn.php");
    require("../../components/AdminHeader/index.php");

    ?>


    <h1 class="text-center text-primary mb-4 fw-bold">Welcome</h1>
    <h4 class="text-left text-danger m-4 fw-bold">Create Users for Back-Office</h4>

    <div class="container">

        <?php
        if (isset($_COOKIE['user_created']) && $_COOKIE['user_created'] == true) {
            echo '<div class="alert alert-success alert-dismissible fade show" id="server_msg" role="alert">
                    User Created
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
        ;

       ?>
    </div>
    <form method="POST" action="../../controllers/user_control/create_user.php"
        class="m-5 p-4 border rounded shadow-sm bg-light">
        <div class="mb-3">
            <label for="category_name" class="form-label fw-semibold">Username</label>
            <input type="text" class="form-control" id="user_name" name="user_name"
                aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="category_name" class="form-label fw-semibold">Password</label>
            <input type="text" class="form-control" id="password" name="password"
                aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Create User</button>
    </form>

         <div class="container">
                <a href="/hnd/controllers/LogOutController.php" type="submit" class="btn btn-danger">Log out</a>
         </div>
    <script>
         // Hide alert message after 5 seconds
        const serverMessage = document.getElementById("server_msg");
        if (serverMessage) {
            setTimeout(() => {
                const bsAlert = new bootstrap.Alert(serverMessage);
                bsAlert.close();
            }, 5000);
        }
    </script>


</body>

</html>