import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;


import axios from 'axios';
// alert("asdasd")







Alpine.start();

console.log("masuk2")

let pesankiri = document.getElementById('kotak_broadcast');
pesankiri.style.display = 'none';
let pesan = document.getElementById('updatepesan');
pesan.style.display = "none";

Echo.private(`user`).listen('.roomchat', (e) => {
    
    
    let chat = document.createElement("p");
    chat.textContent = e.BroadcastPesan;
    pesan.appendChild(chat);
    console.log(e);
    pesankiri.style.display = 'flex';
    pesankiri.style.marginBottom = "10px";
    pesan.style.display = "flex";
    pesan.style.flexDirection = "column";
    
    
    let socketId=window.Echo.socketId()
    // axios.post('/lisanchat', task)
    //     .then((response) => {
    //         this.tasks.push(response.data),
    //         socketId;
    //         console.log("AMAN NIH");
    //     });
    Axios.interceptors.request.use((config) => {
        config.headers['X-Socket-ID'] = window.Echo.socketId() // Echo instance
        return config
      })
      alert("dont")
});



// axios.post('/lisianchat', { headers: socketId })
// .then(response => {
    
// console.log('Socket ID berhasil dikirim ke server');
// })
// .catch(error => {

// console.error('Gagal mengirim Socket ID:', error);
// // pesankiri.style.display = 'none';
// // let pesan = document.getElementById('updatepesan');
// // pesan.style.display = "none";
// });


    
    
    
    // fetch(`/lisianchat`, {
    //         method: 'post',
    //         headers: {
    //                 'X-Socket-ID': socketId,
            
    //             }
    //         })
    //         .then(response => {
    //                 console.log(response.headers);
    //             })
    //             .catch(error => {
                    
    //                     alert("yah eror nih")
    //                     console.error('Error:', error);
    //                 });
                    
    // axios.post(`/lisianchat`, { socketId: socketId })
