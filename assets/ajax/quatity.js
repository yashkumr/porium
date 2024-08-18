let productQty = document.getElementById("valueOfProductQty").textContent;
document.getElementById("productAdd").addEventListener("click",function(){
    let xhr = new XMLHttpRequest();
    console.log(productQty);

    xhr.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            console.log("ok ok");
        }
    }
    xhr.open(GET,"response.php",true);
    xhr.send();
})
