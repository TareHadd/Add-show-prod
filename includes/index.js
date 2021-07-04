
function getSelectedValue() {
var selV = document.getElementById("selectedValue").value;

num = parseInt(selV);

console.log(num);
const dvd = new XMLHttpRequest();
const form = document.getElementById("addhtml");

dvd.onload = function() {
if (this.status === 200) {
form.innerHTML = dvd.responseText;
} else {
alert("Something wrong. Refresh page");
}
};




if (num === 1) {
dvd.open('get', 'form-parts/dvd.php');
dvd.send();
} else


if (num === 2) {

dvd.open('get', 'form-parts/furniture.php');
dvd.send();
} else
if (num === 3) {

dvd.open('get', 'form-parts/book.php');
dvd.send();
} else if (num === 0) {
dvd.open('get', 'form-parts/empty.php');
dvd.send();
};

return num;




};