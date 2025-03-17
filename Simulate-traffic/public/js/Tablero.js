let tablero;
let autos = [];
let simulacionActiva = true; // Variable que indica si la simulación está activa o pausada
let botonSimulacion;


function setup() {
    // Crear el canvas dentro del contenedor con id 'container-map'
    let canvas = createCanvas(600, 600);
    canvas.parent("container-map"); // Asigna el canvas al contenedor con id 'container-map'
    canvas.style("border", "none"); // Elimina cualquier borde si se añadió
    canvas.style("outline", "none"); // Elimina el contorno si es necesario
    tablero = new Tablero();
    frameRate(10);

    // Inicializa autos en una fila para simular la formación
    for (let i = 0; i < 10; i++) {
        // Todos los autos empiezan en la dirección 'derecha'
        autos.push(new Auto(i, int(tablero.filas / 2 + 2), "derecha"));
        
    }
     // Inicializa autos en una fila para simular la formación
     setTimeout(() => {
        for (let i = 0; i < 10; i++) {
            autos.push(new Auto(59 - i, int(tablero.filas / 2 - 2), "izquierda"));
        }
        console.log('Segundo bloque de autos inicializados');
    }, 10000);

    setTimeout(() => {
     // Inicializa autos en una fila para simular la formación
     for (let i = 0; i < 10; i++) {
        autos.push(new Auto(int(tablero.columnas / 2 - 2), i, "abajo"));
    }  }, 20000);

    
    setTimeout(() => {
     // Inicializa autos en una fila para simular la formación
     for (let i = 0; i < 10; i++) {
        autos.push(new Auto(int(tablero.columnas / 2 + 2), 58 - i, "arriba"));
    } }, 30000);

    // Crear botón para pausar/reanudar la simulación
    botonSimulacion = createButton("Pausar");
    botonSimulacion.position(20, height + 20);
    botonSimulacion.mousePressed(toggleSimulacion); // Asocia la acción al presionar el botón
}

function draw() {
    background("#282A36");
    tablero.dibujar();

    if (simulacionActiva) {
        // Mover y dibujar los autos si la simulación está activa
        for (let auto of autos) {
            auto.mover();
            auto.dibujar();
        }
    }
}

// Función que cambia el estado de la simulación
function toggleSimulacion() {
    if (simulacionActiva) {
        simulacionActiva = false;
        botonSimulacion.html("Reanudar");
    } else {
        simulacionActiva = true;
        botonSimulacion.html("Pausar");
    }
}

class Tablero {
    constructor() {
        this.carriles = 2;
        this.columnas = 60;
        this.filas = 60;
        this.lado_celda = 8;
        this.ancho = this.columnas * this.lado_celda;
        this.alto = this.filas * this.lado_celda;
        this.posicion = createVector(
            (width - this.ancho) / 2,
            (height - this.alto) / 2
        );
    }

    coordenada(x, y) {
        return createVector(x, y).mult(this.lado_celda).add(this.posicion);
    }

    dibujar() {
        push();
        noStroke();
        for (let columna = 0; columna < this.columnas; columna++) {
            for (let fila = 0; fila < this.filas; fila++) {
                if (
                    (columna >= this.columnas / 2 - this.carriles &&
                        columna <= this.columnas / 2 + this.carriles) ||
                    (fila >= this.filas / 2 - this.carriles &&
                        fila <= this.filas / 2 + this.carriles)
                ) {
                    fill("black");
                    if (
                        columna == this.columnas / 2 ||
                        fila == this.filas / 2
                    ) {
                        fill("yellow");
                        if (
                            (columna == this.columnas / 2 &&
                                fila >= this.filas / 2 - this.carriles &&
                                fila <= this.filas / 2 + this.carriles) ||
                            (fila == this.filas / 2 &&
                                columna >= this.columnas / 2 - this.carriles &&
                                columna <= this.columnas / 2 + this.carriles)
                        ) {
                            fill("black");
                        }
                    }
                } else {
                    fill("#282A36");
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
        this.tiempoEspera = Math.floor(random(1, 6)); // Tiempo de espera aleatorio (en frames, 1 a 5 segundos)
        this.tiempoEsperado = 0; // Contador de tiempo
        this.enEspera = true; // Determina si el auto está esperando
    }

    mover() {
        if (this.enEspera) {
            this.tiempoEsperado++;
            if (this.tiempoEsperado >= this.tiempoEspera) {
                this.enEspera = false; // El auto comienza a moverse después de su tiempo de espera
            }
        } else {
            if (this.direccion === "derecha") {
                this.posicion.x += 1;
               
            } else if (this.direccion === "abajo") {
                this.posicion.y += 1;
            } else if (this.direccion === "izquierda") {
                this.posicion.x -= 1;
            } else {
                this.posicion.y -= 1;
            }
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
