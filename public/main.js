function checkInputBrand() {
    const inputBrand = document.getElementById("brand");
    if (inputBrand.value === "") {
        inputBrand.style.backgroundColor = "#e0b4b4";
      }
    else{
        inputBrand.style.backgroundColor = "";
    }
}

function checkInputLname() {
  const inputLname = document.getElementById("lname");
  if (inputLname.value === "") {
      inputLname.style.backgroundColor = "#e0b4b4";
    }
  else{
      inputLname.style.backgroundColor = "";
  }
}





