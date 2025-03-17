<div  id="container-map"><!-- Botones en HTML -->
<button  class="hover: bg-green-600 text-white rounded"   id="iniciar-btn">Iniciar Animación</button>
<button class="hover: bg-green-600 text-white rounded " id="parar-btn">Parar Animación</button>
<button  class="hover: bg-green-600 text-white rounded " id="pausar-btn">Pausar</button>
</div>

<script src="path_to_your_p5.js"></script>
<script src="your_script.js"></script>


<script>
  let tablero;
let autos = [];
let simulacionActiva = false; // La simulación empieza pausada
let botonIniciar;
let botonParar;
let botonSimulacion;

function setup() {
    // Crear el canvas dentro del contenedor con id 'container-map'
    let canvas = createCanvas(600, 600);
    canvas.parent("container-map"); // Asigna el canvas al contenedor con id 'container-map'
    canvas.style("border", "none"); // Elimina cualquier borde si se añadió
    canvas.style("outline", "none"); // Elimina el contorno si es necesario
    tablero = new Tablero();
    frameRate(10);

    // Referencias a los botones del HTML
    botonIniciar = document.getElementById('iniciar-btn');
    botonParar = document.getElementById('parar-btn');
    botonSimulacion = document.getElementById('pausar-btn');

    // Asociar eventos de click a los botones
    botonIniciar.addEventListener('click', iniciarSimulacion);
    botonParar.addEventListener('click', pararSimulacion);
    botonSimulacion.addEventListener('click', toggleSimulacion);
}

function draw() {
    background("#282A36");
    tablero.dibujar(); // Dibuja el tablero con las celdas

    if (simulacionActiva) {
        // Mover y dibujar los autos si la simulación está activa
        for (let auto of autos) {
            auto.mover();
            auto.dibujar(); // Dibuja cada auto en su posición actual
        }
    }
}

// Función que cambia el estado de la simulación (pausar o reanudar)
function toggleSimulacion() {
    if (simulacionActiva) {
        simulacionActiva = false;
        botonSimulacion.innerHTML = "Reanudar";
    } else {
        simulacionActiva = true;
        botonSimulacion.innerHTML = "Pausar";
    }
}

// Función para iniciar la simulación (reiniciar desde cero)
function iniciarSimulacion() {
    simulacionActiva = true;
    autos = [];  // Limpiar los autos anteriores
    botonSimulacion.innerHTML = "Pausar";
    console.log("Simulación iniciada");

    // Reiniciar los autos en sus posiciones iniciales
    for (let i = 0; i < 10; i++) {
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
        }
    }, 20000);

    setTimeout(() => {
        // Inicializa autos en una fila para simular la formación
        for (let i = 0; i < 10; i++) {
            autos.push(new Auto(int(tablero.columnas / 2 + 2), 58 - i, "arriba"));
        }
    }, 30000);
}

// Función para parar la simulación (detener la animación completamente)
function pararSimulacion() {
    simulacionActiva = false;
    autos = []; // Limpiar los autos
    botonSimulacion.innerHTML = "Pausar";
    console.log("Simulación parada");
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
        this.posicion = createVector(x, y); // Posición inicial
        this.direccion = direccion; // Dirección de movimiento (derecha, izquierda, arriba, abajo)
        this.color = random(["red", "blue", "yellow", "orange"]); // Color aleatorio para el auto
        this.tiempoEspera = Math.floor(random(1, 6)); // Tiempo de espera aleatorio (en frames)
        this.tiempoEsperado = 0; // Contador de tiempo para la espera
        this.enEspera = true; // Determina si el auto está esperando
    }

    mover() {
        if (this.enEspera) {
            this.tiempoEsperado++;
            if (this.tiempoEsperado >= this.tiempoEspera) {
                this.enEspera = false; // El auto comienza a moverse después de su tiempo de espera
            }
        } else {
            // Movimiento según la dirección
            if (this.direccion === "derecha") {
                this.posicion.x += 1;
            } else if (this.direccion === "abajo") {
                this.posicion.y += 1;
            } else if (this.direccion === "izquierda") {
                this.posicion.x -= 1;
            } else if (this.direccion === "arriba") {
                this.posicion.y -= 1;
            }
        }
    }

    dibujar() {
        push();
        fill(this.color); // Dibuja el auto con su color
        let c = tablero.coordenada(this.posicion.x, this.posicion.y); // Convierte las coordenadas a la escala del tablero
        rect(c.x, c.y, tablero.lado_celda, tablero.lado_celda); // Dibuja un rectángulo que representa al auto
        pop();
    }
}

</script>
