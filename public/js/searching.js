// alert("masuk")
function searching(Data){
    let chatgrup=document.getElementsByClassName('listchat-grup');
    let inputsearching = document.getElementById(Data);
    let kontainerkontak = document.getElementsByClassName('kontainer-kontak');
    for (let x = 0; x < chatgrup.length; x++) {
        kontainerkontak[x].style.display="flex"
    }
    
    let candidat;
    let status=true;
    for (let x = 0; x < chatgrup.length; x++) {
        
        if (chatgrup[x].value == inputsearching.value) {

        status=false; 
        }
        else{
            
            chatgrup[x].style.background="none"
            kontainerkontak[x].style.display="none"
        }
    }
    if(status)
    {
        alert("Chat Tidak Ditemukan, periksa pencarian yang valid")
        for (let x = 0; x < chatgrup.length; x++) {
            kontainerkontak[x].style.display="flex"
        }
    }
    // alert("Data yang di cari adalah "+ inputsearching.value);
}
function closesearch()
{
    let chatgrup=document.getElementsByClassName('listchat-grup');
    
    let kontainerkontak = document.getElementsByClassName('kontainer-kontak');
    for (let x = 0; x < chatgrup.length; x++) {
        kontainerkontak[x].style.display="flex"
    }
}