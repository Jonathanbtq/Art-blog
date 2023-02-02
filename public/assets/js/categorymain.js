function hideDesc(val){
    if(val.className === "contenu_card_publi"){
        val.className = "contenu_card_publi_open";
    }else{
        val.className = "contenu_card_publi";
    }
}

function hideText(div){
        div.children[1].className = "card_publi_abs_hiding";
}
function openText(div){
        div.children[1].className = "card_publi_abs";
}