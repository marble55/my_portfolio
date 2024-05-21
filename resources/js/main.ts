import '../css/app.scss';

let curX : number = 0;
let curY : number = 0;
let tgX : number = 0;
let tgY : number = 0;

document.addEventListener('DOMContentLoaded', () : void => {
    const interBubble : HTMLDivElement = document.querySelector<HTMLDivElement>('.interactive')!;

    function move() : void {
        curX += (tgX - curX) / 20;
        curY += (tgY - curY) / 20;
        interBubble.style.transform = `translate(${Math.round(curX)}px, ${Math.round(curY)}px)`;
        requestAnimationFrame(() : void => {
            move();
        });
    }

    window.addEventListener('mousemove', (event : MouseEvent) : void => {
        
        const scrollX = window.scrollX;
        const scrollY = window.scrollY;

        tgX = event.clientX + scrollX - (interBubble.offsetWidth / 2);
        tgY = event.clientY + scrollY - (interBubble.offsetHeight / 2);
    });

    move();
});