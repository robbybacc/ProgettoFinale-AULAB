// let buttonCard = document.querySelector("#buttonCard");
// function truncateText() {
//     var text = document.getElementById("text").innerHTML;
//     var truncated = text.substring(0, 50) + "...";
//     document.getElementById("text").innerHTML = truncated;
//   }

// buttonCard.addEventListener("click", ()=>{
  //     truncateText()
// })

// Initialization for ES Users
// import { Collapse, Ripple, initMDB } from "mdb-ui-kit";
// 
// initMDB({ Collapse, Ripple });

document.addEventListener('DOMContentLoaded', function() {
  let articoli = document.querySelectorAll('.right-container .articolo');
  let leftContainer = document.querySelector('.left-container');
  let selectedArticle;
  articoli.forEach(articolo => {
    
    let check = false;
    articolo.addEventListener('click', function() {
      if(check == false){

        let title = articolo.getAttribute('data-title');
        let subtitle = articolo.getAttribute('data-subtitle');
        let img = articolo.getAttribute('image');
        let category = articolo.getAttribute('category');
        let user = articolo.getAttribute('user');
        let id = articolo.getAttribute('id');
        let categoryId = articolo.querySelector('#categoryId');
        let userId = articolo.querySelector('#userId');
        let tags = articolo.querySelector('#tags');
        
        let tagsObj = JSON.parse(tags.innerHTML);
        
        selectedArticle = document.createElement('div');
        selectedArticle.classList.add('articolo');
        let imgPath = img;
        imgPath = imgPath.replace('public/', '');
        selectedArticle.innerHTML = `
        <div class="positionCard2">
        <img src="storage/${imgPath}" class="card2 imgCustom mt-2 mb-2">
        <h5 class='fw-bold m-1'>${title}</h5>
        <p class="m-1">${subtitle}</p>
        </div>
        <div class="p-2">
            <p>#${tagsObj[0].name}</p>
            <span class="small text-muted">Categoria:</span>
            <a id="${id}" href="/article/category/${categoryId.innerHTML}" class="text-capitalize text-muted"> ${category}</a>
            <br>
            <span class="small text-muted">Utente:</span>
            <a id="${id}" href="/article/user/${userId.innerHTML}" class="text-capitalize text-muted fw-bold"> ${user}</a>
            </div>
            <div class="positionBotton2 m-3">
            <a href="/article/show/${id}" class="btn btn-botton text-white">Leggilo</a>
            </div>
        `;
        
        
        check = true
        
        leftContainer.innerHTML = '';
        
        leftContainer.appendChild(selectedArticle);
        console.log(tagsObj);
      }else{
        check = false
        console.log(selectedArticle);
        selectedArticle.classList.add('d-none')
      }
    });
    
    
    
    // console.log(articolo);
  });
});

document.addEventListener("DOMContentLoaded", function() {
  let text = "The Aulab Post       ";
  let text2 = "Lascia il tuo segno";
  let speed = 130; 
  let i = 0;
  let element = document.querySelector("#typewriter");
  let element2 = document.querySelector("#typewriter2"); 
  
  function typeWriter() {
    if ( i< text2.length && i < text.length ) {
      element.innerHTML += text.charAt(i);
      element2.innerHTML += text2.charAt(i);
      i++;
      setTimeout(typeWriter,speed);
      
    } else {
      element.style.borderRight = "none";
      element2.style.borderRight = "none";
    }
  }
  
  typeWriter();
});


