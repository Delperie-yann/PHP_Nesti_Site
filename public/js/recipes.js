var prepCounter = 1;
window.addEventListener("DOMContentLoaded", (event) => {
    actualize();
    let input = document.getElementById("formFile");
    input.addEventListener("change", dlImg);
});
function dlImg() {


    let img = document.getElementById("img");
    let imgCtn = document.getElementById("imgCtn");
    let imgDl = document.getElementById("formFile");
    console.log(imgDl.files[0]);
    if (imgDl.value != "") {
        img.src = imgDl.files[0].src;
        img.height = 275;
        img.width = 540;
     
        var fileReader = new FileReader();
        fileReader.readAsDataURL(imgDl.files[0]);
        fileReader.onload = function (fileEvent) {
            img.setAttribute("src", fileEvent.target.result)
        };

        //   imgCtn.appendChild(img);

    }
}

// function addIngredient() {

//     let ingName = document.getElementById("ingName");
//     let ingQty = document.getElementById("ingQty");
//     let ingUnit = document.getElementById("ingUnit");
//     let div = document.createElement("div");
//     let divCtn = document.getElementById("ingCtn");
//     let ing = ingQty.value + " " + ingUnit.value + " " + ingName.value;

//     div.innerHTML = ing;
//     divCtn.appendChild(div);
//     ingName.value = "";
//     ingQty.value = "";
//     ingUnit.value = "";
// }

function addTextArea() {

    let baseItem = document.getElementById("baseItem").innerHTML;
    let newItem = document.createElement("div");
    let prepCtn = document.getElementById("prepCtn");

    newItem.innerHTML = baseItem;
    newItem.className += "row mt-5 prepItem";
    prepCounter++;
    newItem.dataset.order = prepCounter;
    newItem=
    prepCtn.appendChild(newItem);

    actualize();

}

function actualize() {

    let items = document.querySelectorAll(".prepItem");


    items.forEach(item => {
        item.querySelector(".upText").style.visibility = "visible";
        item.querySelector(".downText").style.visibility = "visible";
    });

    let first = document.querySelector("[data-order='1']");
    first.querySelector(".upText").style.visibility = "hidden";

    let last = document.querySelector("[data-order='" + prepCounter + "']");
    last.querySelector(".downText").style.visibility = "hidden";
}

function upBtn(e) {
    let ctn = e.parentNode.parentNode;
    let txt = ctn.querySelector("div>textarea");
    let txt1 = ctn.previousElementSibling.querySelector("div>textarea");
    let value = txt.value;
    let value1 = txt1.value;

    txt.value = value1;
    txt1.value = value;
}

function downBtn(e) {
    let ctn = e.parentNode.parentNode;
    let txt = ctn.querySelector("div>textarea");
    let txt1 = ctn.nextElementSibling.querySelector("div>textarea");
    let value = txt.value;
    let value1 = txt1.value;

    txt.value = value1;
    txt1.value = value;
}

function deleteBtn(e) {
    let ctn = e.parentNode.parentNode;
    let prepCtn = document.querySelector("#prepCtn");

    if (prepCtn.childElementCount != 1) {
        ctn.remove();
    }
}

function onlyNumberKey(evt) {

    let ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}

