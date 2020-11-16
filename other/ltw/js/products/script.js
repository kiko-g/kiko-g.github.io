const form = document.getElementsByTagName('form')[0];
const table = document.getElementById('products');

// event listener to add row to table with form 
form.addEventListener('submit', function (event) {
    const product = form.querySelector('label input[name="description"]').value;
    const quantity = form.querySelector('label input[name="quantity"]').value;

    const tableLine = document.createElement('tr');
    tableLine.innerHTML =
        '<tr>' +
            '<td>' + product + '</td>' +
            '<td><input type="text" value="' + quantity + '"></td>' +
            '<td><input type="button" value="Remove" onClick=removeProductsRow(this)></td>' +
        '</tr>';
    table.append(tableLine);

    event.preventDefault();
});

function removeProductsRow(button) {
    button.parentNode.parentNode.remove();
}



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