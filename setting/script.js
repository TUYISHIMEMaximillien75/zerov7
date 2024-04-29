function toggleSwitch() {
    var switchCheckbox = document.getElementById("switchCheckbox");
    var switchState = document.getElementById("switchState");
  
    if (switchCheckbox.checked) {
      switchState.textContent = "On";
    } else {
      switchState.textContent = "Off";
    }
  }

  function changeTheme(theme){
    if (theme == "light"){
      document.body.style.background = "#fff";
      document.body.style.color = "#000";
    }else {
      document.body.style.background = "#212121";
      document.body.style.color = "#d4d4d4";
    }
  }