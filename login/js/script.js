let date = new Date()
document.querySelector("#year").innerHTML = `~ ${date.getFullYear()}`

function getHoraBoasVindas() {
    let date = new Date()
    if (date.getHours() >= 0 && date.getHours() < 12) {
        document.querySelector("#boas-vindas").innerHTML = "Bom dia!"
    } else if (date.getHours() >= 12 && date.getHours() < 18) {
        document.querySelector("#boas-vindas").innerHTML = "Boa tarde!"
    } else if (date.getHours() >= 18 && date.getHours() <= 23) {
        document.querySelector("#boas-vindas").innerHTML = "Boa noite!"
    }
}
getHoraBoasVindas()
setInterval(() => {
    getHoraBoasVindas()
}, 10000);


$(document).ready(function () {
    $('select').formSelect();
});