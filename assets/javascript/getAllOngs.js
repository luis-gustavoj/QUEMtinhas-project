const ongs = document.getElementsByClassName('org-information-container');
console.log(ongs);
for (let i = 0; i < ongs.length; i++) {
    const ong = ongs[i];
    const availableServings = ong.children[5].outerText;
    console.log(availableServings);
    const inputButton = ong.children[6].children[0];
    if(availableServings <= 0){
        console.log(ong)
        inputButton.disabled = "disabled"; 
        inputButton.classList.add("disabledInput");
        inputButton.classList.remove("enabledInput");
    }
}