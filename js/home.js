const messageContainer = document.querySelector('.message-container') ;
let lastStatu = "" ;

setInterval(function(){
    let request = new XMLHttpRequest() ;

    request.onreadystatechange = function(){
        if (this.readyState === 4 && this.status === 200) {
            data = this.response ;
            if (lastStatu !== data ){ 
                messageContainer.innerHTML = data ;
                lastStatu = data ;
            }
        }
    }
    
    request.open("get" , "homeData.php" , true) ;
    request.send() ;
} , 50)