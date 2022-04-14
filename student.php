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

<body id="student-body">
    <h2 class="mt-2">Welkom bij KeuzedeelMeister</h2>
    <p>De beste keuzedeel kiezer!</p>
    <div id="info-container" class="mt-2">
        <h3>Keuzedelen</h3>
        <div class="list-group" id="keuzedelen-list">
            <a href="https://www.s-bb.nl/" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Spaans</h5>
                    <small class="text-muted">3 plekken vrij</small>
                </div>
                <p class="mb-1">eventueel info of docent</p>
                <small class="text-muted">Klik voor meer info.</small>
            </a>
            <a href="https://www.s-bb.nl/" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Software verdieping</h5>
                    <small class="text-muted">8 plekken vrij</small>
                </div>
                <p class="mb-1">eventueel info of docent</p>
                <small class="text-muted">Klik voor meer info.</small>
            </a>
            <a href="https://www.s-bb.nl/" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">AR & VR</h5>
                    <small class="text-muted">7 plekken vrij</small>
                </div>
                <p class="mb-1">eventueel info of docent</p>
                <small class="text-muted">Klik voor meer info.</small>
            </a>
        </div>
    </div>

    <div id="countdown-container" class="mt-2">
        <h5>Je kunt kiezen over:</h5>
        <span class="h1 font-weight-bold">10</span> Days
        <span class="h1 font-weight-bold">5</span> Hr
        <span class="h1 font-weight-bold">23</span> Min
        <span class="h1 font-weight-bold">15</span> Sec
    </div>

    <div id="keuze-container" class="mt-2">
        <p>Keuzedeel</p>
        <div class="input-group mb-3">
            <label class="input-group-text" for="keuzedeel-select">Keuzedelen</label>
            <select class="form-select" id="keuzedeel-select">
                <option selected>kies...</option>
                <option value="1">Software verdieping</option>
                <option value="2">Spaans</option>
                <option value="3">AR & VR</option>
            </select>
        </div>
        <p>Keuzedeel voorkeur</p>
        <div class="input-group mb-3">
            <label class="input-group-text" for="keuzedeel-voorkeur-select">Keuzedelen</label>
            <select class="form-select" id="keuzedeel-voorkeur-select">
                <option selected disabled>kies...</option>
                <option value="1">Software verdieping</option>
                <option value="2">Spaans</option>
                <option value="3">AR & VR</option>
            </select>
        </div>
        <button class="btn btn-success" type="button">Kies</button>
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