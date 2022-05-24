$(document).ready(function () {
  //checks if user is logged in on opening site
  if (sessionStorage.teacher) {
    console.log(sessionStorage.teacher);
    LoadResults();
    LoadKeuzedelen();
    LoadOpleiding();
    LoadStudenten();
    LoadKlassen();

  } else {
    console.log('teacher not exist in the session storage');
    location.href = "index.php";
  }

  //##buttons click events##
  $('#btn-export-results').on('click', function () {
    ExportResults();
  });

  $('#btn-import-students').on('click', function () {
    $('#import-students-modal').modal('show');
  });

  $('#btn-final-import').on('click', function () {
    ImportStudentsCSV();
  });

  $(document).on('click', ".btn-delete", function () {
    switch (this.dataset.table) {
      case "keuzedelen":
        DeleteKeuzedeel(this.id);
        break;
      case "opleiding":
        DeleteOpleiding(this.id);
        break;
      case "studenten":
        DeleteStudent(this.id);
        break;
      case "klassen":
        DeleteKlas(this.id);
        break;
      case "resultaten":
        DeleteResultaat(this.id);
        break;
      default:
        console.log("error");
    }
  });
});