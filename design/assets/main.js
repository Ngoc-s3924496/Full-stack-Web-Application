// double click on the heart icon
$(".fa-heart").dblclick(function () {
  $(".notification-bubble").show(400);
});

$(document).on("scroll", function () {
  if ($(document).scrollTop() > 50) {
    $(".navigation").addClass("shrink");
  } else {
    $(".navigation").removeClass("shrink");
  }
});

var search = document.getElementById("search-bar");
search.addEventListener("keydown", function (e) {
  if (e.keyCode === 13) {
    validate(e);
  }
});

function validate(e) {
  alert("Validated");
}