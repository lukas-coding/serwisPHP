function checkFilled() {
    const inputVal = document.getElementById("brand");
      if (inputVal.value === "") {
        inputVal.style.backgroundColor = "#e0b4b4";
      }
    else{
        inputVal.style.backgroundColor = "";
    }
}





