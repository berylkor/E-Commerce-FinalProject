let decreaseqty = document.querySelectorAll(".decreaseqty");
let quantity = document.querySelectorAll(".quantity");
let increaseqty = document.querySelectorAll(".increaseqty");

decreaseqty.forEach((btn, index) =>{
    btn.addEventListener('click', ()=>{
        let qtycurrent = parseInt(quantity[index].textContent);
        if (qtycurrent > 1)
        {
            quantity[index].textContent = qtycurrent - 1;
        }
    })
});

increaseqty.forEach((btn, index) => {
    btn.addEventListener('click', ()=>{
        let qtycurrent = parseInt(quantity[index].textContent);
         quantity[index].textContent = qtycurrent + 1;
    })
});