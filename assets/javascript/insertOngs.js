function checkFields () {
  let fields = document.querySelectorAll('input');
  let fieldChecker = true;
  fields = Array.prototype.slice.call(fields);
  fields.shift();
  fields.pop();
  
  fields.forEach(field => {
    if(field.value === ""){
      field.style.borderStyle = "Solid";
      field.style.borderWidth = "1px";
      field.style.borderColor = "red";
      fieldChecker = false;
    }
  });

  if(fieldChecker){
    SubmitFormData();
  }
}
function SubmitFormData() {
  var name = $("#name").val();
  var description = $("#desc").val();
  var place = $("#place").val();
  var dailyCapacity = $("#dailyCapacity").val();
  console.log(name, description, place, dailyCapacity);
  $.post(
    "./assets/php/insertOng.php",
    {
      name: name,
      description: description,
      place: place,
      dailyCapacity: dailyCapacity,
    },
    () => {
      document.getElementById("register-success").style.visibility = "visible";
      document.getElementById("modal").style.visibility = "visible";
    }
  );
}

document.getElementById("submitButton").addEventListener("click", checkFields);
document.getElementById("returnButton").addEventListener("click", () => {
  location.href = "./index.html";
});