$(document).ready(function () {
  //for delete function
  let deleteTableName = "";
  let deleteID = 0;

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
    tableNameDelete = this.dataset.table;
    deleteID = this.id;
    $('#delete-confirm-modal').modal('show');
  });
  
  $(document).on('click', ".btn-confrim-delete", function () {
    switch (tableNameDelete) {
      case "keuzedelen":
        DeleteKeuzedeel(deleteID);
        break;
      case "opleiding":
        DeleteOpleiding(deleteID);
        break;
      case "studenten":
        DeleteStudent(deleteID);
        break;
      case "klassen":
        DeleteKlas(deleteID);
        break;
      case "resultaten":
        DeleteResultaat(deleteID);
        break;
      default:
        console.log("error");
    }
  });
});