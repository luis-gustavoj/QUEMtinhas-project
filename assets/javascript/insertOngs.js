document.getElementById("returnButton").addEventListener("click", () => {
  location.href = "./index.html";
});

document
  .getElementById("submitButton")
  .addEventListener("click", SubmitFormData);

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
