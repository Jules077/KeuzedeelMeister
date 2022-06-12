<!DOCTYPE html>
<html lang="en" class="login-html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"
        href="https://roc-teraa.nl/wp-content/themes/roc/src/assets/favicon/favicon-32x32.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>KeuzedeelMeister</title>
</head>

<!-- Modal Notification -->
<div class="modal fade notification-modal" tabindex="-1" id="notification-modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" id="notification-header"></div>
            <div class="modal-body" id="notification-message">
            </div>
            <div class="modal-footer">
                <button type="button" style="width: 100%;" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<body class="text-center login-body">

    <main class="form-signin">
            <img class="mb-4"
                src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fopleiding.com%2Fu%2Fopleider%2Froc-ter-aa-1.png&f=1&nofb=1"
                alt="" height="57">
            <h1 class="h3 mb-3 fw-normal">KeuzedeelMeister</h1>
            <p>Studenten login</p>

            <div class="form-floating">
                <input type="number" id="student-nummer-login" class="form-control" placeholder="00000">
                <label for="student-nummer-login">Studenten nummer</label>
            </div>
            <div class="form-floating">
                <input type="date" id="geboorte-login" class="form-control" placeholder="Geboorte datum">
                <label for="geboorte-login">Geboorte datum</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" id="student-login" type="submit">Log in</button>
    </main>

    <!-- BOOTSTRAP, JS, ETC. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="js/main.js"></script>
</body>

</html>