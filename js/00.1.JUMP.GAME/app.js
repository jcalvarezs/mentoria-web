document.addEventListener('DOMContentLoaded', () =>{
    const character = document.querySelector('.character')
    const KEY_UP=38
    const MAXIMUN_HEIGHT = 250
    GRAVITY=0.9
    let bottom = 0
    
    function jump(){
        let timerUp = setInterval(()=> {
            if (buttom >= MAXIMUN_HEIGHT) {
                clearInterval(timerUp)
            }


            bottom +=30
            character.style.bottom = (bottom * GRAVITY) +'px';

        }, 20)
     
    }
    
    
        document.addEventListener('keydowm', (event) => {
            switch(event.keyCode){
                case KEY_UP:
                    jump()
                    break;
            }


        })

    
}) 