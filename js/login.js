const form = document.forms[0] ;
const loginBtn = document.getElementById('login') ;
const errorContainer = document.querySelector('.error') ;
form.onsubmit = (e)=> {
    e.preventDefault() ;
}

loginBtn.onclick = function (){
    let request = new XMLHttpRequest() ;

    request.onreadystatechange = function(){
        if (this.readyState === 4 && this.status === 200) {
            let respe = this.response ;
            if (respe === "success" ){
                location.href = "home.php" ;
            } else {
                errorContainer.innerHTML = respe ;
            }
        }
    }
    
    let formData = new FormData(form) ;

    request.open("post" , "login.php" , true) ;
    request.send(formData) ;
}