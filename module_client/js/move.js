const move = {
    up: false,
    right: false,
    down: false,
    left: false,
}

window.addEventListener('keydown', (e) => {
    if(e.code == 'keyW' || e.key == 'ArrowUp') {
        move.up = true;
        move.right = false;
        move.down = false;
        move.left = false;
    } else if (e.code == 'keyD' || e.key == 'ArrowRight') {
        move.up = false;
        move.right = true;
        move.down = false;
        move.left = false;
    } else if (e.code == 'keyS' || e.key == 'ArrowDown') {
        move.up = false;
        move.right = false;
        move.down = true;
        move.left = false;
    } else if (e.code == 'keyA' || e.key == 'ArrowLeft') {
        move.up = false;
        move.right = false;
        move.down = false;
        move.left = true;
    }
});

export default move;