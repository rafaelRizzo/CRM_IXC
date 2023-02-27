const btn_mais = document.querySelector(".container-helper")

const addAlertaPulse = () => {
    document.querySelector(".container-helper .btn-floating").classList.remove("pulse")
    document.querySelector(".container-helper .btn-floating").classList.add("pulse")
}

const removeAlertaPulse = () => {
    document.querySelector(".container-helper .btn-floating").classList.remove("pulse")
}
