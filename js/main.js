//Notification types
function Notifications(NotificationMessage, NotificationType) {
  switch (NotificationType) {
    case "APIError":
      APIException(NotificationMessage);
      break;
    case "successful":
      Successfulchange(NotificationMessage);
      break;
    case "error":
      ErrorMessage(NotificationMessage);
      break;
    default:
      console.log(NotificationMessage);
  }
};

//Notification styling api expection
function APIException(NotificationMessage) {
  console.log(NotificationMessage);
  $("#notification-message").html("<p>" + NotificationMessage + "</p>");
  $("#notification-header").html("<p>API Error!</p>");
  $('#notification-modal').modal('show');
}

//Notification styling succesfull change
function Successfulchange(NotificationMessage) {
  console.log(NotificationMessage);
  $("#notification-message").html("<p>" + NotificationMessage + "</p>");
  $("#notification-header").html("<p>success!</p>");
  $('#notification-modal').modal('show');
}

//Notification styling error
function ErrorMessage(NotificationMessage) {
  console.log(NotificationMessage);
  $("#notification-message").html("<p>" + NotificationMessage + "</p>");
  $("#notification-header").html("<p>Error!</p>");
  $('#notification-modal').modal('show');
}

//Teacher login api call
function TeacherLoginAPICall(email, password) {
  var email = email;
  var password = password;
  if (email != "" && password != "") {
    $.ajax({
      url: "php/API_login_teacher.php",
      type: "POST",
      data: {
        email: email,
        password: password
      },
      cache: false,
      success: function (dataResult) {
        var dataResult = JSON.parse(dataResult);
        if (dataResult.statusCode == 200) {
          //if result is succesfull set session so user keeps being loggged in
          sessionStorage.setItem('email', email);
          sessionStorage.setItem('teacher', dataResult.teacher);
          //Notification logged in
          location.href = "teacher_keuzedelen.php";
        } else if (dataResult.statusCode == 201) {
          Notifications("Password or username wrong", "error");
        } else {
          Notifications("Something horrible went wrong o no", "APIError");
        }
      }
    });
  } else {
    Notifications("Please fill in all the fields", "error");
  }
}

//Student login api call
function StudentLoginAPICall(studentenNummer, geboorte) {
  var studentenNummer = studentenNummer;
  var geboorte = geboorte;
  if (studentenNummer != "" && geboorte != "") {
    $.ajax({
      url: "php/API_login_student.php",
      type: "POST",
      data: {
        studentenNummer: studentenNummer,
        geboorte: geboorte
      },
      cache: false,
      success: function (dataResult) {
        var dataResult = JSON.parse(dataResult);
        if (dataResult.statusCode == 200) {
          //if result is succesfull set session so user keeps being loggged in
          sessionStorage.setItem('studentenNummer', studentenNummer);
          //Notification logged in
          location.href = "student.php";
        } else if (dataResult.statusCode == 201) {
          Notifications("Password or username wrong", "error");
        } else {
          Notifications("Something horrible went wrong o no", "APIError");
        }
      }
    });
  } else {
    Notifications("Please fill in all the fields", "error");
  }
}

function StudentLoader(studentenNummer) {
  $.ajax({
    url: "php/API_student_keuzedelen.php",
    type: "GET",
    data: {
      studentenNummer: studentenNummer
    },
    cache: false,
    success: function (dataResult) {
      let result = JSON.parse(dataResult);
      console.log(result);
      if (result.statusCode == 200) {
        $("#keuzedelen-list").html("");
        $("#keuzedeel-voorkeur-select").html("<option selected disabled>kies...</option>");
        $("#keuzedeel-select").html("<option selected disabled>kies...</option>");

        $.each(result, function (key, value) {
          if (key != "statusCode" && key != "gekozen") {
            if (result[key].keuzedeelNummer != null) {
              //check for free space for students too join
              let freeSpace = 0;
              if (result[key].plaatsen == null) {
                freeSpace = 0;
              } else if (result[key].keuzedeel_count == null) {
                freeSpace = result[key].plaatsen;
              } else {
                freeSpace = result[key].plaatsen - result[key].keuzedeel_count;
              }
              //generate list for students to check
              $("#keuzedelen-list").append(`
              <a href="${result[key].keuzedeel_info_url}" class="list-group-item list-group-item-action flex-column align-items-start">
                 <div class="d-flex w-100 justify-content-between">
                     <h5 class="mb-1">${result[key].keuzedeel_info}</h5>
                     <small class="text-muted">${freeSpace} vrije plekken</small>
                 </div>
                 <p class="mb-1">${result[key].docent}</p>
                 <small class="text-muted">Klik voor meer info.</small>
              </a>
              `);

              //generate selection list and disable full options
              if (freeSpace > 0) {
                $("#keuzedeel-select").append(`<option value="${result[key].keuzedeelNummer}">${result[key].keuzedeel_info}</option>`);
              } else {
                $("#keuzedeel-select").append(`<option value="${result[key].keuzedeelNummer}" disabled>${result[key].keuzedeel_info}</option>`);
              }
              $("#keuzedeel-voorkeur-select").append(`<option value="${result[key].keuzedeelNummer}">${result[key].keuzedeel_info}</option>`);
            } else {
              $("#keuzedelen-list").append(`Er zijn geen keuzedelen!`);
            }

            //define end date
            var endDate = new Date(Date.parse(result[key].eind_kiezen.replace(/-/g, '/')));
            // Get today's date and time
            var now = new Date().getTime();
            // Find the distance between now and the count end date
            var distance = endDate - now;
            //for if the end date has been reached
            if (distance > 0) {
              if (result.gekozen[0] === undefined && typeof result.gekozen[0] == 'undefined') {
                Countdown(result[key].start_kiezen);
              } else {
                $('#none-container').show();
              }
            } else {
              $('#none-container').show();
            }
          }

        });
      } else if (result.statusCode == 201) {
        Notifications("didnt get any data", "error");
      } else if (result.statusCode == 403) {
        Notifications("your not logged in", "error");
      } else {
        Notifications("Something horrible went wrong o no", "APIError");
      }
    }
  });
}

//for logging out
function Logout() {
  sessionStorage.clear;
  $.ajax({
    url: "php/API_logout.php",
    type: "POST",
    data: {},
    cache: false,
    success: function (dataResult) {
      console.log(dataResult);
    }
  });
  location.href = "index.php";
};

function KeuzedeelConfirmed() {
  let studentenNummer = sessionStorage.studentenNummer;
  let keuzedeel = sessionStorage.keuzedeel;
  let keuzedeelVoorkeur = sessionStorage.keuzedeelVoorkeur;

  $.ajax({
    url: "php/API_student_select.php",
    type: "POST",
    data: {
      studentenNummer: studentenNummer,
      keuzedeel: keuzedeel,
      keuzedeelVoorkeur: keuzedeelVoorkeur
    },
    cache: false,
    success: function (dataResult) {
      let result = JSON.parse(dataResult);
      console.log(result);
      if (result.statusCode == 200) {
        StudentLoader(sessionStorage.studentenNummer);
        $('#confirm-keuze').modal('hide');
        $('#keuze-container').hide();
        $('#none-container').show();
        Notifications("Je hebt je keuzedeel gekozen!", "successful");
      } else if (result.statusCode == 403) {
        $('#confirm-keuze').modal('hide');
        Notifications("Data verkeerd wat probeer je te doen?!?!?!", "error");
      } else {
        $('#confirm-keuze').modal('hide');
        Notifications("Something horrible went wrong o no", "APIError");
      }
    }
  });
};

function KeuzedeelSubmit() {
  if ($('#keuzedeel-voorkeur-select').children("option:selected").val() == "kies..." || $('#keuzedeel-select').children("option:selected").val() == "kies...") {
    Notifications("Selecteer eerst je keuzedelen", "error");
  } else {
    $('#confirm-keuze').modal('show');
    sessionStorage.setItem('keuzedeelVoorkeur', $('#keuzedeel-voorkeur-select').children("option:selected").val());
    sessionStorage.setItem('keuzedeel', $('#keuzedeel-select').children("option:selected").val());
    $("#confirm-body").html("");
    $("#confirm-body").html(
      $('#keuzedeel-select').children("option:selected").html() + `</br>` +
      $('#keuzedeel-voorkeur-select').children("option:selected").html()
    );
  }
};

function ExportResults() {
  let teacher = sessionStorage.teacher;
  $.ajax({
    url: "php/API_teacher_load_results.php",
    type: "GET",
    data: {
      teacher: teacher
    },
    cache: false,
    success: function (dataResult) {
      let result = JSON.parse(dataResult);
      if (result.statusCode == 200) {
        //default on top of the table values
        let rows = [
          ["StudentenNummer", "Voornaam", "tussenvoegsel", "Achternaam", "Klas", "KeuzedeelNummer", "KeuzedeelNaam", "KeuzedeelVoorkeurNummer", "KeuzedeelVoorkeurNaam", "GekozenDatum"],
        ];

        //loops through data checks if student alrady excists in array and adds data else it will add new row for student
        $.each(result, function (key, value) {
          console.log(value);
          let arrayCheck = -1;
          for (let i = 0; i < rows.length; i++) {
            arrayCheck = $.inArray(value.studenten_nummer, rows[i]);
            if (arrayCheck == 0) {
              if (value.prioriteit == 1) {
                rows[i][0] = value.studenten_nummer;
                rows[i][1] = value.voornaam;
                rows[i][2] = value.tussenvoegsel;
                rows[i][3] = value.achternaam;
                rows[i][4] = value.klas_naam;
                rows[i][5] = value.keuzedeel_nummer;
                rows[i][6] = value.keuzedeel_info;
                rows[i][9] = value.gekozen_op;
                return;
              } else if (value.prioriteit == 2) {
                rows[i][0] = value.studenten_nummer;
                rows[i][1] = value.voornaam;
                rows[i][2] = value.tussenvoegsel;
                rows[i][3] = value.achternaam;
                rows[i][4] = value.klas_naam;
                rows[i][7] = value.keuzedeel_nummer;
                rows[i][8] = value.keuzedeel_info;
                rows[i][9] = value.gekozen_op;
                return;
              }
            }
          }
          if (arrayCheck != 0) {
            if (value.prioriteit == 1) {
              rows.push([value.studenten_nummer, value.voornaam, value.tussenvoegsel, value.achternaam, value.klas_naam, value.keuzedeel_nummer, value.keuzedeel_info, '', '', value.gekozen_op]);
            } else if (value.prioriteit == 2) {
              rows.push([value.studenten_nummer, value.voornaam, value.tussenvoegsel, value.achternaam, value.klas_naam, '', '', value.keuzedeel_nummer, value.keuzedeel_info, value.gekozen_op]);
            }
          }
        });
        console.log(rows);

        let csvContent = "data:text/csv;charset=utf-8,";

        rows.forEach(function (rowArray) {
          let row = rowArray.join(";");
          csvContent += row + "\r\n";
        });

        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "Results-KeuzedelenMeister.csv");
        document.body.appendChild(link); // Required for FF

        link.click(); // This will download the data file named "my_data.csv".
      } else if (result.statusCode == 201) {
        Notifications("didnt get any data", "error");
      } else if (result.statusCode == 403) {
        Notifications("your not logged in", "error");
      } else {
        Notifications("Something horrible went wrong o no", "APIError");
      }
    }
  });
};

function ImportStudentsCSV() {
  let csvArr = [];
  const csvFile = document.getElementById("student-import-file");

  const input = csvFile.files[0];
  const reader = new FileReader();

  reader.onload = function (e) {
    const text = e.target.result;
    csvArr = csvToArray(text);
    ImportStudents(csvArr);
    // const data = csvToArray(text);
    // document.write(JSON.stringify(data));
  };
  reader.readAsText(input);
};

function ImportStudents(studentArray){
  $.each(studentArray, function (key, value) {
    console.log(value.Roepnaam);
  });
  Notifications("could not read the document!", "error");
};

function csvToArray(str, delimiter = ";") {
  // slice from start of text to the first \n index
  // use split to create an array from string by delimiter
  console.log(str);
  const headers = str.replace(/[\r\n]/g, " ").slice(0, str.indexOf("\n")).split(delimiter);
  console.log(headers);
  // slice from \n index + 1 to the end of the text
  // use split to create an array of each csv value row
  const rows = str.replace(/[\r]/g, "").slice(str.indexOf("\n") + 1).split("\n");
  console.log(rows);


  // Map the rows
  // split values from each row into an array
  // use headers.reduce to create an object
  // object properties derived from headers:values
  // the object passed as an element of the array
  const arr = rows.map(function (row) {
    const values = row.split(delimiter);
    const el = headers.reduce(function (object, header, index) {
      object[header] = values[index];
      return object;
    }, {});
    return el;
  });

  // return the array
  return arr;
}

//load keuzedelen for teacher page
function LoadKeuzedelen() {
  let teacher = sessionStorage.teacher;

  $.ajax({
    url: "php/API_teacher_load_keuzedelen.php",
    type: "GET",
    data: {
      teacher: teacher
    },
    cache: false,
    success: function (dataResult) {
      let result = JSON.parse(dataResult);

      if (result.statusCode == 200) {
        $("#keuzedelen-table-body").html("");

        $.each(result, function (key, value) {
          //setting the html table
          if (key != "statusCode") {
            $("#keuzedelen-table-body").append(`<tr>
            <td>${result[key].keuzedeel_ID}</td>
            <td contenteditable="true">${result[key].keuzedeel_info}</td>
            <td contenteditable="true">${result[key].keuzedeel_info_url}</td>
            <td contenteditable="true">${result[key].keuzedeelNummer}</td>
            <td><button id="${result[key].keuzedeel_ID}" type="button" data-table="keuzedelen" class="btn btn-outline-danger btn-delete btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
            </svg></button></td></tr>`);
          }
        });
      } else if (result.statusCode == 201) {
        Notifications("didnt get any data", "error");
      } else if (result.statusCode == 403) {
        Notifications("your not logged in", "error");
      } else {
        Notifications("Something horrible went wrong o no", "APIError");
      }
    }
  });
}

//load opleidingen for teacher page
function LoadOpleiding() {
  let teacher = sessionStorage.teacher;

  //ajax call
  $.ajax({
    url: "php/API_teacher_load_opleiding.php",
    type: "GET",
    data: {
      teacher: teacher
    },
    cache: false,
    success: function (dataResult) {
      let result = JSON.parse(dataResult);

      if (result.statusCode == 200) {
        $("#opleiding-table-body").html("");

        $.each(result, function (key, value) {
          //setting html
          if (key != "statusCode") {
            $("#opleiding-table-body").append(`<tr>
            <td>${result[key].opleiding_ID}</td>
            <td contenteditable="true">${result[key].crebo}</td>
            <td contenteditable="true">${result[key].opleiding_naam}</td>
            <td><button id="${result[key].opleiding_ID}" data-table="opleiding" type="button" class="btn btn-outline-danger btn-sm btn-delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
            </svg></button></td></tr>`);
          }
        });
      } else if (result.statusCode == 201) {
        Notifications("didnt get any data", "error");
      } else if (result.statusCode == 403) {
        Notifications("your not logged in", "error");
      } else {
        Notifications("Something horrible went wrong o no", "APIError");
      }
    }
  });
}

function LoadStudenten() {
  let teacher = sessionStorage.teacher;

  $.ajax({
    url: "php/API_teacher_load_studenten.php",
    type: "GET",
    data: {
      teacher: teacher
    },
    cache: false,
    success: function (dataResult) {
      let result = JSON.parse(dataResult);

      if (result.statusCode == 200) {
        $("#studenten-table-body").html("");

        $.each(result, function (key, value) {
          if (key != "statusCode") {
            let tussenvoegsel = null;
            if (result[key].tussenvoegsel == null) {
              tussenvoegsel = "";
            } else {
              tussenvoegsel = result[key].tussenvoegsel;
            }
            $("#studenten-table-body").append(`<tr>
            <td>${result[key].studenten_nummer}</td>
            <td contenteditable="true">${result[key].voornaam}</td>
            <td contenteditable="true">${tussenvoegsel}</td>
            <td contenteditable="true">${result[key].achternaam}</td>
            <td contenteditable="true">${result[key].geboorte}</td>
            <td contenteditable="true">${result[key].klas_naam}</td>
            <td><button id="${result[key].studenten_nummer}" type="button" data-table="studenten" class="btn btn-outline-danger btn-delete btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
            </svg></button></td></tr>`);
          }
        });
      } else if (result.statusCode == 201) {
        Notifications("didnt get any data", "error");
      } else if (result.statusCode == 403) {
        Notifications("your not logged in", "error");
      } else {
        Notifications("Something horrible went wrong o no", "APIError");
      }
    }
  });
};

function LoadKlassen() {
  let teacher = sessionStorage.teacher;

  $.ajax({
    url: "php/API_teacher_load_klas.php",
    type: "GET",
    data: {
      teacher: teacher
    },
    cache: false,
    success: function (dataResult) {
      let result = JSON.parse(dataResult);

      if (result.statusCode == 200) {
        $("#klassen-table-body").html("");

        $.each(result, function (key, value) {
          if (key != "statusCode") {
            $("#klassen-table-body").append(`<tr>
            <td contenteditable="true">${result[key].klas_naam}</td>
            <td contenteditable="true">${result[key].opleiding_crebo}</td>
            <td contenteditable="true">${result[key].start_kiezen}</td>
            <td contenteditable="true">${result[key].eind_kiezen}</td>
            <td><button id="${result[key].klas_naam}" type="button" data-table="klassen" class="btn btn-outline-danger btn-delete btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
            </svg></button></td></tr>`);
          }
        });
      } else if (result.statusCode == 201) {
        Notifications("didnt get any data", "error");
      } else if (result.statusCode == 403) {
        Notifications("your not logged in", "error");
      } else {
        Notifications("Something horrible went wrong o no", "APIError");
      }
    }
  });
};

function LoadResults() {
  let teacher = sessionStorage.teacher;

  $.ajax({
    url: "php/API_teacher_load_results.php",
    type: "GET",
    data: {
      teacher: teacher
    },
    cache: false,
    success: function (dataResult) {
      let result = JSON.parse(dataResult);

      if (result.statusCode == 200) {
        $("#results-table-body").html("");

        $.each(result, function (key, value) {
          if (key != "statusCode") {
            $("#results-table-body").append(`<tr>
            <td>${result[key].resultaat_id}</td>
            <td contenteditable="true">${result[key].studenten_nummer}</td>
            <td contenteditable="true">${result[key].keuzedeel_nummer}</td>
            <td contenteditable="true">${result[key].prioriteit}</td>
            <td contenteditable="true">${result[key].gekozen_op}</td>
            <td><button id="${result[key].resultaat_id}" type="button" data-table="resultaten" class="btn btn-outline-danger btn-delete btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
            </svg></button></td></tr>`);
          }
        });
      } else if (result.statusCode == 201) {
        Notifications("didnt get any data", "error");
      } else if (result.statusCode == 403) {
        Notifications("your not logged in", "error");
      } else {
        Notifications("Something horrible went wrong o no", "APIError");
      }
    }
  });
};

function DeleteKeuzedeel(keuzedelID) {
  let teacher = sessionStorage.teacher;

  $.ajax({
    url: "php/API_teacher_delete_keuzedeel.php",
    type: "POST",
    data: {
      teacher: teacher,
      keuzedeelID: keuzedelID
    },
    cache: false,
    success: function (dataResult) {
      let result = JSON.parse(dataResult);
      if (result.statusCode == 200) {
        LoadKeuzedelen();
        Notifications(keuzedelID + " deleted", "successful");
      } else if (result.statusCode == 201) {
        Notifications("didnt get any data", "error");
      } else if (result.statusCode == 403) {
        Notifications("your not logged in", "error");
      } else if (result.statusCode == 404) {
        Notifications(result.error, "error");
      } else {
        Notifications("Something horrible went wrong o no", "APIError");
      }
    }
  });
};

function DeleteOpleiding(opleidingID) {
  let teacher = sessionStorage.teacher;

  $.ajax({
    url: "php/API_teacher_delete_opleiding.php",
    type: "POST",
    data: {
      teacher: teacher,
      opleiding: opleidingID
    },
    cache: false,
    success: function (dataResult) {
      let result = JSON.parse(dataResult);
      if (result.statusCode == 200) {
        LoadOpleiding();
        Notifications(opleidingID + " deleted", "successful");
      } else if (result.statusCode == 201) {
        Notifications("didnt get any data", "error");
      } else if (result.statusCode == 403) {
        Notifications("your not logged in", "error");
      } else if (result.statusCode == 404) {
        Notifications(result.error, "error");
      } else {
        Notifications("Something horrible went wrong o no", "APIError");
      }
    }
  });
};

function DeleteStudent(studentenNummer) {
  let teacher = sessionStorage.teacher;

  $.ajax({
    url: "php/API_teacher_delete_student.php",
    type: "POST",
    data: {
      teacher: teacher,
      student: studentenNummer
    },
    cache: false,
    success: function (dataResult) {
      let result = JSON.parse(dataResult);
      if (result.statusCode == 200) {
        LoadStudenten();
        Notifications(studentenNummer + " deleted", "successful");
      } else if (result.statusCode == 201) {
        Notifications("didnt get any data", "error");
      } else if (result.statusCode == 403) {
        Notifications("your not logged in", "error");
      } else if (result.statusCode == 404) {
        Notifications(result.error, "error");
      } else {
        Notifications("Something horrible went wrong o no", "APIError");
      }
    }
  });
};

function DeleteKlas(klasNaam) {
  let teacher = sessionStorage.teacher;

  $.ajax({
    url: "php/API_teacher_delete_klas.php",
    type: "POST",
    data: {
      teacher: teacher,
      klas: klasNaam
    },
    cache: false,
    success: function (dataResult) {
      let result = JSON.parse(dataResult);
      if (result.statusCode == 200) {
        LoadKlassen();
        Notifications(klasNaam + " deleted", "successful");
      } else if (result.statusCode == 201) {
        Notifications("didnt get any data", "error");
      } else if (result.statusCode == 403) {
        Notifications("your not logged in", "error");
      } else if (result.statusCode == 404) {
        Notifications(result.error, "error");
      } else {
        Notifications("Something horrible went wrong o no", "APIError");
      }
    }
  });
};

function DeleteResultaat(resultaatID) {
  let teacher = sessionStorage.teacher;

  $.ajax({
    url: "php/API_teacher_delete_resultaat.php",
    type: "POST",
    data: {
      teacher: teacher,
      resultaat: resultaatID
    },
    cache: false,
    success: function (dataResult) {
      let result = JSON.parse(dataResult);
      if (result.statusCode == 200) {
        LoadResults();
        Notifications(resultaatID + " deleted", "successful");
      } else if (result.statusCode == 201) {
        Notifications("didnt get any data", "error");
      } else if (result.statusCode == 403) {
        Notifications("your not logged in", "error");
      } else if (result.statusCode == 404) {
        Notifications(result.error, "error");
      } else {
        Notifications("Something horrible went wrong o no", "APIError");
      }
    }
  });
};

function Countdown(countDate) {
  // Set the date we're counting down to
  var countDownDate = new Date(Date.parse(countDate.replace(/-/g, '/')));
  // Update the count down every 1 second
  var x = setInterval(function () {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
    document.getElementById("countdown-container").innerHTML = '<h5>Je kunt kiezen over:</h5>' +
      '<span class="h1 font-weight-bold">' + days + '</span> D' +
      '<span class="h1 font-weight-bold">' + hours + '</span> H' +
      '<span class="h1 font-weight-bold">' + minutes + '</span> M' +
      '<span class="h1 font-weight-bold">' + seconds + '</span> S';

    // If the count down is over, write some text 
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("countdown-container").innerHTML = "EXPIRED";
      $('#countdown-container').hide();
      $('#keuze-container').show();
      return;
    }
    $('#countdown-container').show();
    $('#keuze-container').hide();
  }, 1000);
}

//Document ready
$(document).ready(function () {
  //##buttons click events##
  //Teacher Login button
  $('#teacher-login').on('click', function () {
    TeacherLoginAPICall($('#email-login').val(), $('#password-login').val());
  });

  //Student Login button
  $('#student-login').on('click', function () {
    StudentLoginAPICall($('#student-nummer-login').val(), $('#geboorte-login').val());
  });

  //Logout button
  $('#btn-logout').on('click', function () {
    Logout();
  });
});