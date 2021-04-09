(function(){
    let bout = document.querySelectorAll('.radio');
    let carrousel = document.querySelector('.carrousel-2');
    let k = 0;

    for (const bt of bout)
    {
        bt.value = k++;
        bt.addEventListener('mousedown', function(){
            carrousel.style.transform = "translateX(" + (-this.value * 100) + "vw)";
        })
    }
}());

