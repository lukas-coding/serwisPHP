function validateInput(id){
  const inputBrand = document.getElementById(id);
  if (inputBrand.value === "") {
      inputBrand.style.backgroundColor = "#e0b4b4";
    }
  else{
      inputBrand.style.backgroundColor = "";
  }
}

function deleteConfirm(id){
 let box = confirm('Czy napewno usunąć naprawę?');
 if(box){
  window.location.href=`/?action=delete&id=${id}`; 
 }
return box;
}





