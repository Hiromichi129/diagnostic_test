const toLogin = () => {
    window.location.href = "/diagnostic_test/login_form.php"
}

const toMypage = () => {
    window.location.href = "/diagnostic_test/mypage.php"
}

const element = document.getElementsByClassName("Question_E")[0];

element.id = "newId";

element.innerHTML = "Q2.英文を品詞分解することができる";