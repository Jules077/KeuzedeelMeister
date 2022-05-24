<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"
        href="https://roc-teraa.nl/wp-content/themes/roc/src/assets/favicon/favicon-32x32.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Keuzendeel Form</title>
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

<!-- Modal confirm -->
<div class="modal fade" id="confirm-keuze" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Weet je het zeker??</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="confirm-body">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" style="float: left; width: 48%;" id="keuzedeel-confirmed"
                    name="btnuploadxml">Ja</button>
                <button type="button" style="float: right; width: 48%;" class="btn btn-danger"
                    data-bs-dismiss="modal">Nee</button>
            </div>
        </div>
    </div>
</div>

<body id="student-body">
    <h2 class="mt-2">Welkom bij KeuzedeelMeister</h2>
    <p>De beste keuzedeel kiezer!</p>
    <div id="info-container" class="mt-2">
        <h3>Keuzedelen</h3>
        <div class="list-group" id="keuzedelen-list">
        </div>
    </div>

    <div id="countdown-container" class="mt-2">
    </div>

    <div id="keuze-container" class="mt-2">
        <p>Keuzedeel</p>
        <div class="input-group mb-3">
            <label class="input-group-text" for="keuzedeel-select">Keuzedelen</label>
            <select class="form-select" id="keuzedeel-select">
            </select>
        </div>
        <p>Keuzedeel voorkeur</p>
        <div class="input-group mb-3">
            <label class="input-group-text" for="keuzedeel-voorkeur-select">Keuzedelen</label>
            <select class="form-select" id="keuzedeel-voorkeur-select">
            </select>
        </div>
        <button class="btn btn-success" id="keuzedeel-submit" type="button">Kies</button>
    </div>

    <div id="none-container" class="mt-2">
        <h3>Je kan niks meer kiezen!</h3>
        <h5>"Good luck, have fun"<br><small>-Jules Zwarts</small></h5>
        <button type="button" class="btn btn-danger" id="btn-logout">Afmelden</button>
    </div>

    <!-- BOOTSTRAP, JS, ETC. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="js/main.js"></script>
    <script src="js/student.js"></script>
</body>

</html>