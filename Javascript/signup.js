const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorTEXT = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
    e.preventDefault(); // preventing form from submitting
}

continueBtn.onclick = ()=>{
    // Start Ajax
    let xhr = new XMLHttpRequest(); // creating XML obect
    xhr.open("POST" , "php/signup.php" , true);
    xhr.onload = ()=>{
       if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data = xhr.response;
            if(data == "success"){

            } else {
              errorTEXT.textContent = data;
              errorTEXT.style.display = "block";
              
            }
        }
       }
    }
  
    // we have send data ajax to php
    let formdata = new formdata(form); // creating new form data object
    xhr.send(formdata); // send formdata to php
}