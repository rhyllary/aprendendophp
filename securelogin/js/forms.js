function formhash(form, password) {
    var p = document.createElement("input");
    form.appendChild(p);
    p.type = "hidden";
    p.value = hex_sha512(password.value);

    password.value = "";

    form.submit();
}

function regformhash(form, uid, email, password, conf){
    //confira se cada campo tem um valor 

    if 
    (
        uid.value == ""   ||
        email.value == ""  ||
        password.value == ""  ||
        conf.value == ""
    )
        {
            alert('You must provide all the request details.please try again');
            return false;
        }
}
//Verifica o nome de usuario 

re = /^\w+$/;

if (!re.test(form.username.value)) {
    alert("username must contain only letters, numbers and underscores.please try again");

    form.username.focus();
    return false;
}

//confira se a senha é comprimida o suficiente (no minímo, 6 caracteres)
//a verificação é duplicada a baixo, mas o cuidado estra é para dar mais
//orientação especificas ao usuario


if(password.value.length < 6){
    alert('passwords must contain at least one number, one lowercase and one uppercase letter. Please try again');

    reurn false;

}

//pelo menos um numero, uma letra minuscula e outra maiuscula 
//pelo menos 6 caracteres

var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
if