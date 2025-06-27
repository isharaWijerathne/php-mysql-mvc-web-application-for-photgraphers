<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth</title>
</head>
<body>
    <?php require("../include/cdn.php") ; 
    
        if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

        if (isset($_SESSION['auth'])) {
            header('Location: /hnd/admin/dashboard/index.php');
            exit;
        }

    ?>

    

    <div class="container" >
        <div class="row" >
            <div class="col-6 col-sm-12  offset-sm-0 offset-3">
            <form class="border rounded m-5 p-4"> 
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="text" class="form-control" id="email" aria-describedby="emailHelp">
                    
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" >
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    <div id="validater" class="form-text text-danger">try again password incorect</div>
                </div>
                <button type="submit" id="btn" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
    
    <script type="module" src="auth.js"></script>
</body>
</html>