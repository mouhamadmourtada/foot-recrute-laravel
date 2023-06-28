{
    let icon_bar = document.querySelector('.bar_icon');
    let gauche = document.querySelector('.gauche');
    let droite = document.querySelector('.droite');
    let last_paragraph = document.querySelector('.my_last_paragraphe')

    let listener = null;

    const toggle_sidebar =async () => {
        


        if(document.body.offsetWidth < 795){
            if(gauche.classList.contains('gauche_sidebar')){
                gauche.style.animation = "0.5s disparaitre_gauche";
                setTimeout( () =>{
                    gauche.classList.toggle('gauche_sidebar')
                },500);
                // gauche.classList.toggle('gauche_sidebar');
            }else{
                gauche.style.animation = "0.5s apparaitre_gauche";
                gauche.classList.toggle('gauche_sidebar');
            }
            // droite.classList.toggle('droite_with_sidebar');
            last_paragraph.classList.toggle('noircir');
        }
    }

    last_paragraph.addEventListener('click', toggle_sidebar);
    icon_bar.addEventListener('click', toggle_sidebar);




    let widht = document.body.offsetWidth.toString();
    widht = parseInt(widht, 10);

    const resize_body = () => {
        console.log("resize body appelé!");
        if(widht < 795 && document.body.offsetWidth > 795){
            if(gauche.classList.contains('gauche_sidebar')){
                gauche.classList.remove('gauche_sidebar');
                last_paragraph.classList.remove('noircir');
                droite.classList.remove('droite_with_sidebar');
            }
        }

        widht = widht = document.body.offsetWidth.toString();
        widht = parseInt(widht, 10);
       
    }
    let timeOut_resiz_sidebar;

    window.addEventListener("resize", function() {   
        clearTimeout(timeOut_resiz_sidebar);
        timeOut_resiz_sidebar = setTimeout(resize_body, 500);
    });
}
// le margin auto du sidebar
{
    let timeOut_anime_sidebar;

    window.addEventListener("resize", function() {   
        clearTimeout(timeOut_anime_sidebar);
        timeOut_anime_sidebar = setTimeout(margin_for_footer, 500);
    });

    const margin_for_footer = () => {
        document.querySelector('.last_sidebar_element').style.marginBottom = 1000 +'px';
        console.log(document.querySelector('.last_sidebar_element').offsetHeight);
        let footer_height = document.querySelector('.footer').offsetHeight;
        if(footer_height == 0) {
            footer_height = 250;
        }
       
        console.log(footer_height);
        document.querySelector('.last_sidebar_element').style.marginBottom = footer_height+5 + 'px';
    }
    margin_for_footer();
    
}
