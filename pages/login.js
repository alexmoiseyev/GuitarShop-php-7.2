
document.getElementById('btn').onclick=function(){
    var inputValue_login = document.getElementById('login__input').value;
    var  inputValue_password = document.getElementById('password__input').value;
    if(inputValue_login === "" || inputValue_password === ""){
        alert("Ошикба в логине или пароле");
    }else {
    alert("Вы вошли");
    window.location.href = "./index.php";
}
console.log(inputValue_login)
}
