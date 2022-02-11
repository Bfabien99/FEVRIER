let radio = document.querySelectorAll('input[type="radio"]');

    radio[0].addEventListener('click',function(event){    
        
        radio[0].parentElement.classList.toggle("red")
        radio[1].parentElement.classList.remove("red")
        
    })

    radio[1].addEventListener('click',function(event){    
        
        radio[1].parentElement.classList.toggle("red")
        radio[0].parentElement.classList.remove("red")
        
    })



