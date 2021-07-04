const dform = document.getElementById("product_form");
const name = document.getElementById("name");
const sku = document.getElementById("sku");
const price = document.getElementById("price");
const error = document.getElementById("error");

// const input = document.getElementById("input");
// const select = document.getElementById('selectedValue');
// console.log(select.value);

dform.addEventListener('submit', (e) => {
    let messages = [];
    if (name.value === '' || name.value == null) {
        messages.push('Name is required');
    }

    if (sku.value === '' || sku.value == null) {
        messages.push('Sku is required');
    }

    if (price.value === '' || price.value == null) {
        messages.push('Price is required');
    }

    if (messages.length > 0) {
        e.preventDefault();
        error.innerText = messages.join('\n');
        document.getElementById("warning").innerHTML="<i class='fas fa-exclamation-triangle mx-1 fa-5x'></i>"
    }
});

const sel = document.getElementById("selectedValue");
if (sel.value == 0)
{
}