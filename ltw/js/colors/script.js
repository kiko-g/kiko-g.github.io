'use strict'

let select = document.getElementById("colors")
let text = document.querySelector('input[type=text]')
let button = document.querySelector('input[type=button]')

select.addEventListener("change", colorChanged)
button.addEventListener("click", addColor)

// Handler for change event on color select
function colorChanged(event) {
  let paragraphs = document.getElementsByTagName("p") // Get all paragraphs
  for (let i = 0; i < paragraphs.length; i++)
    paragraphs[i].style.color = this.value    // event.target as the SelectElement
}

// Handler for add button click
function addColor() {
  let option = document.createElement("option")
  option.value = text.value
  option.innerHTML = text.value
  select.appendChild(option)
}
