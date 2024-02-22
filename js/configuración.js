function togglePopup() {
    var popup = document.getElementById("popup");
    var taskbarWindow = document.getElementById("taskbar-window");

    if (popup.style.display === "none") {
      popup.style.display = "block";
      taskbarWindow.style.display = "none";
    } else {
      popup.style.display = "none";
      taskbarWindow.style.display = "block";
    }
  }