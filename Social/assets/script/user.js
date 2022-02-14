let file = document.querySelector('.file');
const div1 = document.createElement('div');
div1.classList.add('display_image');
const btnclose = document.createElement('button');
btnclose.classList.add('btnclose');
let img = document.querySelector('.imgbox');
let text = document.querySelector('.uploadtext');

file.addEventListener('change',function(){
    img.append(div1);
    div1.append(btnclose);
    btnclose.addEventListener("click",function(e){
        e.preventDefault();
        div1.style.backgroundImage="";
        div1.remove();
        text.textContent="Upload picture"
    })
    const reader = new FileReader();
    reader.addEventListener("load",() =>{
       uploaded_image = reader.result;
       document.querySelector(".display_image").style.backgroundImage= `url(${uploaded_image})`;
       text.textContent="Change picture"

    });
    reader.readAsDataURL(this.files[0]);
})
