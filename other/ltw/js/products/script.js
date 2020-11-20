// let aux = [];
// row = table.querySelectorAll('tr');
// for (let i = 1; i < row.length; i++)
//     aux.push(row[i]);
// row = aux;
// removeButtons = table.querySelectorAll('tr td:nth-child(3) input[type=button]');
// for (let i = 0; i < removeButtons.length; i++) {
//     removeButtons[i].addEventListener('click', function (e) {
//         row[i].remove();
//     });
// }

window.addEventListener('load', function () {
  let children = document.querySelectorAll('form input');
  for (let i = 0; i < children.length; i++) {
    console.log(children[i].outerHTML)
  }

  console.log(document.getElementsByTagName('form'));
  console.log(document.querySelector('form :nth-child(2) > input'));

  let realTotal = 0;
  let fakeTotal = 0;
  let form = document.getElementsByTagName('form')[0]
  let table = document.getElementById('products');
  let total = document.getElementById('total');

  function updateTotal() {
    total.innerHTML = (realTotal + fakeTotal).toString();
  }

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    let row = document.createElement('tr');
    let desc = document.createElement('td');
    desc.innerHTML = e.target[0].value;
    let qty = document.createElement('td');
    qty.innerHTML = e.target[1].value;
    let rem = document.createElement('input');
    rem.type = 'button';
    rem.value = 'Remove';
    rem.onclick = (event) => {
      let thisRow = event.target.parentElement;
      let remValue = parseInt(thisRow.childNodes[1].innerHTML);
      realTotal -= remValue;
      updateTotal();
      table.removeChild(thisRow);
    };

    let addValue = parseInt(e.target[1].value);
    realTotal += addValue;
    updateTotal();

    row.appendChild(desc);
    row.appendChild(qty);
    row.appendChild(rem);
    table.appendChild(row);
  });



  qtyInput = document.querySelector('form :nth-child(2) > input');
  qtyInput.addEventListener('input', (event) => {

    let value = event.target.value;
    if (value.length == 0)
      value = 0;

    fakeTotal = parseInt(value);
    updateTotal();

  });

})