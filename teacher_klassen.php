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

<!-- Modal delete -->
<div class="modal fade delete-modal" tabindex="-1" id="delete-confirm-modal" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header" id="delete-header"><h2>Delete</h2></div>
      <div class="modal-body" id="delete-message">
        <p>Weet je het zeker?</p>
      </div>
      <div class="modal-footer">
        <button type="button" style="width: 46%;" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" style="width: 46%;" class="btn btn-success btn-confrim-delete" data-bs-dismiss="modal">Confirm</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal import students -->
<div class="modal fade" id="import-students-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Students</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="import-students-body">
              <label class="form-label" for="student-import-file">select student csv document</label>
              <input type="file" class="form-control" id="student-import-file" />
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" style="float: left; width: 48%;" id="btn-final-import"
                    name="btnuploadxml">Import</button>
                <button type="button" style="float: right; width: 48%;" class="btn btn-danger"
                    data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">KeuzedeelMeister</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav form-control form-control-dark w-100">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" id="btn-logout" href="#">Sign out</a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="teacher_keuzedelen.php">
                Keuzedelen
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="teacher_opleidingen.php">
                Opleidingen
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="teacher_studenten.php">
                Studenten
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="teacher_klassen.php">
                Klassen
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="teacher_resultaten.php">
                Resultaten
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>SVG Export Import</span>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" id="btn-export-results" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-file-text" aria-hidden="true">
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                  <polyline points="14 2 14 8 20 8"></polyline>
                  <line x1="16" y1="13" x2="8" y2="13"></line>
                  <line x1="16" y1="17" x2="8" y2="17"></line>
                  <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
                Export Resultaten
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-file-text" aria-hidden="true">
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                  <polyline points="14 2 14 8 20 8"></polyline>
                  <line x1="16" y1="13" x2="8" y2="13"></line>
                  <line x1="16" y1="17" x2="8" y2="17"></line>
                  <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
                Import Studenten
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="chartjs-size-monitor">
          <div class="chartjs-size-monitor-expand">
            <div class=""></div>
          </div>
          <div class="chartjs-size-monitor-shrink">
            <div class=""></div>
          </div>
        </div>
        <h2>Klassen</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col"><input type="text" id="input-klas-naam" class="form-control" placeholder="Klas Naam"
                    aria-label="Klas Naam"></th>
                <th scope="col"><input type="text" id="input-opleiding-crebo" class="form-control"
                    placeholder="Opleiding crebo" aria-label="Opleiding crebo"></th>
                <th scope="col"><input type="text" id="input-start-kiezen" class="form-control"
                    placeholder="Start Kiezen" aria-label="Start Kiezen"></th>
                <th scope="col"><input type="text" id="input-eind-kiezen" class="form-control" placeholder="Eind Kiezen"
                    aria-label="Eind Kiezen"></th>
                <th scope="col"><button id="btn-add" type="button" class="btn btn-outline-success "><svg
                      xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-plus-square" viewBox="0 0 16 16">
                      <path
                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                      <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg></button</th> </tr> <tr>
                <th scope="col">Klas Naam</th>
                <th scope="col">Opleiding crebo</th>
                <th scope="col">Start Kiezen</th>
                <th scope="col">Eind Kiezen</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody id="klassen-table-body">
            </tbody>
          </table>
        </div>
      </main>
    </div>
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
  <script src="js/teacher.js"></script>
</body>

</html>