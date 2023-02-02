function hideSize(val){
    val.addEventListener('click', () =>{
        val.children[1].style.overflow  = 'visible';
        val.children[1].style.height  = '100px';
    })
}
