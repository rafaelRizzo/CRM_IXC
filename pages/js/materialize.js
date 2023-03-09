$(document).ready(function () {
    $('select').formSelect()
})

document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.fixed-action-btn')
    var instances = M.FloatingActionButton.init(elems, {
        direction: 'top',
        hoverEnabled: false
    })
})

$(document).ready(function () {
    $('.tooltipped').tooltip()
})

$(document).ready(function () {
    $('.modal').modal()
})

$(document).ready(function () {
    $('#testandoselect').formSelect()
})

$(document).ready(function () {
    $('input#input_text, textarea#text-obs').characterCounter()
})