<html class="h-100" lang="en">

<head>

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

<body class="d-flex h-100 text-center text-white bg-dark">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

        <main class="px-3">
            <h1>KeuzedeelMeister.</h1>
            <p class="lead">Kies student of docent om vervolgens in te loggen.</p>
            <p class="lead">
                <a href="./login_student.php" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Student</a>
            </p>
            <p class="lead">
                <a href="./login_teacher.php" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Docent</a>
            </p>
        </main>

        <footer class="mt-auto text-white-50">
            <p>made by: Jules Zwarts</p>
        </footer>
    </div>
</body>

</html>