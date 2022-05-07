var heart_click = document.querySelectorAll(".heart");
for (i = 0; i < heart_click.length; i++) {
  let click = heart_click[i];
  click.onclick = function () {
    heart_click_fuc(click);
  };
}

function heart_click_fuc(element) {
  if (element.classList.contains("liked") === true) {
    element.classList.remove("liked", "fas");
    element.classList.add("icon-size", "far");
  } else {
    element.classList.remove("icon-size", "far");
    element.classList.add("liked", "fas");
  }
}

var bookmark_click = document.querySelectorAll(".bookmark");
for (i = 0; i < bookmark_click.length; i++) {
  let click = bookmark_click[i];
  click.onclick = function () {
    bookmark_click_fuc(click);
  };
}

function bookmark_click_fuc(element) {
  if (element.classList.contains("fas") === true) {
    element.classList.remove("fas");
    element.classList.add("far");
  } else {
    element.classList.remove("far");
    element.classList.add("fas");
  }
}
