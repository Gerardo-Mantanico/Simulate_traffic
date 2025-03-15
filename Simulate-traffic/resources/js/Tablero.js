class Tablero {
    constructor() {
        this.carriles = 2;
        this.columnas = 60;
        this.filas = 60;
        this.lado_celda = 8;
        this.ancho = this.columnas * this.lado_celda;
        this.alto = this.filas * this.lado_celda;
        this.posicion = createVector((width - this.ancho) / 2, (height - this.alto) / 2);
    }

    coordenada(x, y) {
        return createVector(x, y).mult(this.lado_celda).add(this.posicion);
    }

    dibujar() {
        push();
        noStroke();
        for (let columna = 0; columna < this.columnas; columna++) {
            for (let fila = 0; fila < this.filas; fila++) {
                if ((columna >= (this.columnas / 2 - this.carriles) && columna <= (this.columnas / 2 + this.carriles)) ||
                    (fila >= (this.filas / 2 - this.carriles) && fila <= (this.filas / 2 + this.carriles))) {
                    fill("black");
                    if (columna == this.columnas / 2 || fila == this.filas / 2) {
                        fill("yellow");
                        if ((columna == this.columnas / 2 && (fila >= (this.filas / 2) - this.carriles && fila <= (this.filas / 2) + this.carriles)) ||
                            (fila == this.filas / 2 && (columna >= (this.columnas / 2) - this.carriles && columna <= (this.columnas / 2) + this.carriles))) {
                            fill("black");
                        }
                    }
                } else {
                    fill("green");
                }
                let c = this.coordenada(columna, fila);
                rect(c.x, c.y, this.lado_celda);
            }
        }
        pop();
    }
}

class Auto {
    constructor(x, y, direccion) {
        this.posicion = createVector(x, y);
        this.direccion = direccion; // 'horizontal' o 'vertical'
        this.color = random(["red", "blue", "yellow", "orange"]);
    }

    mover() {
        if (this.direccion === 'horizontal') {
            this.posicion.x += 1;
        } else {
            this.posicion.y += 1;
        }
    }

    dibujar() {
        push();
        fill(this.color);
        let c = tablero.coordenada(this.posicion.x, this.posicion.y);
        rect(c.x, c.y, tablero.lado_celda, tablero.lado_celda);
        pop();
    }
}

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
        autos.push(new Auto(0, int((tablero.filas / 2)+2), 'horizontal'));
        autos.push(new Auto(int((tablero.columnas / 2)-2), 0, 'vertical'));
    }
    
    for (let auto of autos) {
        auto.mover();
        auto.dibujar();
    }
}
