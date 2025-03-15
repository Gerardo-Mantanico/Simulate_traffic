let tablero;
let autos = [];

function setup() {
    createCanvas(500, 500);
    tablero = new Tablero();
    frameRate(10);
}

function draw() {
    background(220);
    tablero.dibujar();
    
    if (frameCount % 20 === 0) {
       autos.push(new Auto(50, int(tablero.filas / 2), 'horizontal'));
       autos.push(new Auto(int(tablero.columnas / 2), 0, 'vertical'));
    }
    
}
