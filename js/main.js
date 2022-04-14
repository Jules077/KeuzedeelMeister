//Notification types
function Notifications(NotificationMessage, NotificationType) {
    switch(NotificationType) {
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
    $("#notification-message").html("<p>"+NotificationMessage+"</p>");
    $("#notification-header").html("<p>API Error!</p>");
    $('#notification-modal').modal('show');
}

//Notification styling succesfull change
function Successfulchange(NotificationMessage) {
    console.log(NotificationMessage);
    $("#notification-message").html("<p>"+NotificationMessage+"</p>");
    $("#notification-header").html("<p>success!</p>");
    $('#notification-modal').modal('show');
}

//Notification styling error
function ErrorMessage(NotificationMessage){
    console.log(NotificationMessage);
    $("#notification-message").html("<p>"+NotificationMessage+"</p>");
    $("#notification-header").html("<p>Error!</p>");
    $('#notification-modal').modal('show');
}

//Teacher login api call
function TeacherLoginAPICall(email, password){
  var email = email;
  var password = password;
  if(email!="" && password!="" ){
    $.ajax({
      url: "php/API_login_teacher.php",
      type: "POST",
      data: {
        email: email,
        password: password						
      },
      cache: false,
      success: function(dataResult){
        var dataResult = JSON.parse(dataResult);
        if(dataResult.statusCode==200){
          //if result is succesfull set session so user keeps being loggged in
          sessionStorage.setItem('email', email);
          sessionStorage.setItem('teacher', dataResult.teacher);
          //Notification logged in
          location.href = "teacher_keuzedelen.php";
        }
        else if(dataResult.statusCode==201){
          Notifications("Password or username wrong", "error");
        }else{
          Notifications("Something horrible went wrong o no", "APIError");
        }
      }
    });
  }
  else{
    Notifications("Please fill in all the fields", "error");
  }
}

//Student login api call
function StudentLoginAPICall(studentenNummer, geboorte){
  var studentenNummer = studentenNummer;
  var geboorte = geboorte;
  if(studentenNummer!="" && geboorte!="" ){
    $.ajax({
      url: "php/API_login_student.php",
      type: "POST",
      data: {
        studentenNummer: studentenNummer,
        geboorte: geboorte						
      },
      cache: false,
      success: function(dataResult){
        var dataResult = JSON.parse(dataResult);
        if(dataResult.statusCode==200){
          //if result is succesfull set session so user keeps being loggged in
          sessionStorage.setItem('studentenNummer', studentenNummer);
          //Notification logged in
          location.href = "student.php";
        }
        else if(dataResult.statusCode==201){
          Notifications("Password or username wrong", "error");
        }else{
          Notifications("Something horrible went wrong o no", "APIError");
        }
      }
    });
  }
  else{
    Notifications("Please fill in all the fields", "error");
  }
}

function StudentLoader(studentenNummer) {
  $.ajax({
    url: "php/API_student_keuzedelen.php",
    type: "POST",
    data: {studentenNummer: studentenNummer},
    cache: false,
    success: function(dataResult){
      let result = JSON.parse(dataResult);
      console.log(dataResult);

      if(result.statusCode==200){

        result.forEach(obj => {
          Object.entries(obj).forEach(([key, value]) => {
              console.log(`${key} ${value}`);
          });
          console.log('-------------------');
      });

        $("#keuzedelen-list").html("");
        $("#keuzedeel-voorkeur-select").html("<option selected disabled>kies...</option>");
        $("#keuzedeel-select").html("<option selected disabled>kies...</option>");
        // for(let i = 0; i < result.length; i++){
        //   $("#keuzedelen-list").append(`
        //    <a href="${result[i].keuzedeel_info_url}" class="list-group-item list-group-item-action flex-column align-items-start">
        //         <div class="d-flex w-100 justify-content-between">
        //             <h5 class="mb-1">${result[i].keuzedeel_info}</h5>
        //             <small class="text-muted">3 plekken vrij</small>
        //         </div>
        //         <p class="mb-1">eventueel info of docent</p>
        //         <small class="text-muted">Klik voor meer info.</small>
        //     </a>
        //     `);
        //   $("#keuzedeel-select").append(`<option value="${result[i].keuzedeel_nummer}">${result[i].keuzedeel_info}</option>`);
        //   $("#keuzedeel-voorkeur-select").append(`<option value="${result[i].keuzedeel_nummer}">${result[i].keuzedeel_info}</option>`);
        // }
      }      
      else if(result.statusCode==201){
        Notifications("didnt get any data", "error");
      }else{
        Notifications("Something horrible went wrong o no", "APIError");
      }
    }
  });

}

//for logging out
function Logout(){
  sessionStorage.removeItem("email");
  sessionStorage.removeItem("teacher");
  location.href = "index.php";
};

function Countdown(){
  // Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

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
  document.getElementById("countdown-container").innerHTML = '<h5>Je kunt kiezen over:</h5>'
        + '<span class="h1 font-weight-bold">'+days+'</span> D'
        + '<span class="h1 font-weight-bold">'+days+'</span> H'
        + '<span class="h1 font-weight-bold">'+days+'</span> M'
        + '<span class="h1 font-weight-bold">'+days+'</span> S';
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown-container").innerHTML = "EXPIRED";
  }
}, 1000);
}

//Document ready
$( document ).ready(function() {
  //##buttons click events##
  //Teacher Login button
  $('#teacher-login').on('click', function() {
    TeacherLoginAPICall($('#email-login').val(), $('#password-login').val());
  });

  //Student Login button
  $('#student-login').on('click', function() {
    StudentLoginAPICall($('#student-nummer-login').val(), $('#geboorte-login').val());
  });

  //Logout button
  $('#btn-logout').on('click', function() {
    Logout();
  });
});