const form = document.forms[0] ;
const sendBtn = document.getElementById('send') ;
const discusionContainer = document.querySelector('.discusion') ;
const message_input = document.getElementById('message_input') ;
let data ;
let lastStatu = "" ;

form.onsubmit = (e)=> {
    e.preventDefault() ;
    message_input.value = "" ;
}

sendBtn.onclick = function (){

    let request = new XMLHttpRequest() ;

    let formData = new FormData(form) ;

    request.open("post" , "send.php" , true) ;
    request.send(formData) ;
    
}


setInterval(function(){
    let request = new XMLHttpRequest() ;

    request.onreadystatechange = function(){
        if (this.readyState === 4 && this.status === 200) {
            data = this.response ;
            if (lastStatu !== data ){ 
                discusionContainer.innerHTML = data ;
                lastStatu = data ;
            }
            
        }
    }
    
    let formData = new FormData(form) ;
    request.open("post" , "all_message.php" , true) ;
    request.send(formData) ;
} , 50)

