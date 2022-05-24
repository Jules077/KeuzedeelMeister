$(document).ready(function () {
  //checks if user is logged in on opening site
  if (sessionStorage.studentenNummer) {
    StudentLoader(sessionStorage.studentenNummer);
  } else {
    console.log('studentenNummer not exist in the session storage');
    location.href = "index.php";
  }
  //##buttons click events##
  $('#keuzedeel-submit').on('click', function () {
    KeuzedeelSubmit();
  });
  $('#keuzedeel-confirmed').on('click', function () {
    KeuzedeelConfirmed();
  });
});