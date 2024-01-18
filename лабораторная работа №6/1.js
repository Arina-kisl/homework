let form = document.getElementById("reg_form");
form.addEventListener("submit", function(event){
    event.preventDefault(); // отменяет стандартные действия браузера

    // <span class="error-text">Заполните поле</span>

  /*  let data = new FormData(this);
    data.forEach(function(item, index){
        console.log(index,item)
    });  */
  

    let errors = document.querySelectorAll(".error-text");

    if(errors.length){
        Array.from(errors).forEach((errorSpan) => {
            errorSpan.parentElement.classList.remove("error");
            errorSpan.remove();
        })
    }

    let hasError = false;

    let nameInput = document.querySelector("#name");
    let emailInput = document.querySelector("#email");
    let phoneInput = document.querySelector("#phone");
    let cityInput = document.querySelector("#city");
    let familInput = document.querySelector("#famil");
    let otchInput = document.querySelector("#otch");
    let namesInput = document.querySelector("#names");
    let passportInput = document.querySelector("#passport");
    let seriesInput = document.querySelector("#series");
    let numbersInput = document.querySelector("#numbers");


    let fields = [nameInput, emailInput, phoneInput, familInput, cityInput, otchInput, namesInput, passportInput, seriesInput, numbersInput];

    fields.forEach((field) => {
        if(field.value == ""){
            let span = document.createElement("span");
            span.className = "error-text"; // span.classList.add("error-text");
            span.innerText = "Заполните поле";
            field.insertAdjacentElement("afterend", span);
            field.parentElement.classList.add("error");
            hasError = true;
        }
    });

    let pol = ["#nes", "#razv", "#vd"];

    let checked = pol.some((radioId) => {
        return document.querySelector(radioId).checked; //document.querySelector(radioId) - input
    })

    if(!checked){
        let span = document.createElement("span");
        span.className = "error-text"; // span.classList.add("error-text");
        span.innerText = "Выберите семейное положение";
        document.querySelector("#vd").parentElement.insertAdjacentElement("afterend", span);
        hasError = true;
    }

    let obrazovanie2 = ["#srp", "#os", "#nach", "#nm"];

    checked = obrazovanie2.some((checkboxId) => {
        return document.querySelector(checkboxId).checked; //document.querySelector(checkbox) - input
    })

    if(!checked){
        let span = document.createElement("span");
        span.className = "error-text"; // span.classList.add("error-text");
        span.innerText = "Выберите общее образование";
        document.querySelector("#nm").parentElement.insertAdjacentElement("afterend", span);
        hasError = true;
    }
    let obrazovanie = ["#vis", "#nvis", "#sr", "#n"];

    checked = obrazovanie.some((checkboxId) => {
        return document.querySelector(checkboxId).checked; //document.querySelector(checkbox) - input
    })

    if(!checked){
        let span = document.createElement("span");
        span.className = "error-text"; // span.classList.add("error-text");
        span.innerText = "Выберите профессиональное образование";
        document.querySelector("#n").parentElement.insertAdjacentElement("afterend", span);
        hasError = true;
    }

    if(!hasError){
        let div = document.querySelector(".result");

        div.innerHTML += `Фамилия: ${familInput.value}<br>`;
        div.innerHTML += `Имя: ${nameInput.value}<br>`;
        div.innerHTML += `Отчество: ${otchInput.value}<br>`;
        div.innerHTML += `Наименование документа, удостоверяющего личность: ${namesInput.value}<br>`;
        div.innerHTML += `Наименование документа, удостоверяющего личность: ${seriesInput.value}<br>`;
        div.innerHTML += `Серия: ${numberInput.value}<br>`;
        div.innerHTML += `Номер: ${passportInput.value}<br>`;
        div.innerHTML += `Email: ${emailInput.value}<br>`;
        div.innerHTML += `Телефон: ${phoneInput.value}<br>`;
        div.innerHTML += `Город: ${cityInput.value}<br>`;
        if(document.querySelector("#nes").checked){
            div.innerHTML += `Семейное положение: ${document.querySelector("#nes").value}<br>`;
        } else if(document.querySelector("#razv").checked){
            div.innerHTML += `Семейное положение: ${document.querySelector("#razv").value}<br>`;
        } else if(document.querySelector("#vd").checked){
            div.innerHTML += `Семейное положение: ${document.querySelector("#vd").value}<br>`;
        } 

        let obrazovanieValue = [];

        obrazovanie.forEach((obrazovanie) => {
            if(document.querySelector(obrazovanie).checked){
                obrazovanieValue.push(document.querySelector(obrazovanie).value);
            }
        })

        let obrazovanie2Value = [];

        obrazovanie2.forEach((obrazovanie2) => {
            if(document.querySelector(obrazovanie2).checked){
                obrazovanie2Value.push(document.querySelector(obrazovanie2).value);
            }
        })

        div.innerHTML += `Профессиональное образование: ${obrazovanieValue.join(",")}<br>`;
        div.innerHTML += `Общее образование: ${obrazovanie2Value.join(",")}<br>`;

        this.reset(); // очищение формы this==form
    }
})
function correctdate(date) {
  if (isblank(date)) {
    return "Дата рождения некорректна";
  }
  date = date.toString();
  let massiv = date.split("-");
  if (parseInt(massiv[1]) < 10) {
    massiv[1] = '0' + parseInt(massiv[1]);
  }
  else{}
  if (parseInt(massiv[2]) < 10) {
    massiv[2] = '0' + parseInt(massiv[2]);
  }
  else{}
  return "Ваша дата рождения:" + massiv[2] + "." + massiv[1] + "." + massiv[0];
  
}

