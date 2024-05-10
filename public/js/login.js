register=document.getElementById('register')
login=document.getElementById('login')
kontainer_login=document.getElementById('kontainer_login')
kontainer_register=document.getElementById('kontainer_register')

register.addEventListener("click",function(){
kontainer_login.style.display="none"
kontainer_register.style.display="flex"
});
login.addEventListener("click",function(){
kontainer_login.style.display="flex"
kontainer_register.style.display="none"
});
    
    
    
