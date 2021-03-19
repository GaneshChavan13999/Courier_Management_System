function getFare() {
    var weight=document.getElementById("weight").textContent;
    var leg=document.getElementById("leg").textContent;
    var wid=document.getElementById("wid").textContent;
    var high=document.getElementById("high").textContent;
    var fare,fare1,fare2;
    if(weight<15){
        fare1=weight*90;
        fare2=leg*wid*high/100;
        fare=Math.min(fare1,fare2);
    }
    else{
        fare=weight*150;
    }
    document.getElementById("fare").textContent=fare;
}