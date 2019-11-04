

function displayModal(el)
{
    const modal = document.getElementsByClassName('modale'+el)
    if(modal[0].style.display =="none")
    {
        modal[0].style.display = "flex";
    }
    else{
        modal[0].style.display  ="none";
    }
}
