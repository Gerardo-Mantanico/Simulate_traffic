class Auto {
    constructor(x, y, direccion) {
        this.posicion = createVector(x, y);
        this.direccion = direccion; // 'horizontal' o 'vertical'
        this.color = random(["red", "blue", "white", "orange"]);
        this.haGirado = false;
    }

    mover() {
        let interseccionX = int(tablero.columnas / 2);
        let interseccionY = int(tablero.filas / 2);
        let enInterseccion = (this.posicion.x === interseccionX && this.direccion === 'horizontal') ||
                              (this.posicion.y === interseccionY && this.direccion === 'vertical');
        
        if (enInterseccion && !this.haGirado) {
            let decision = random(["recto", "izquierda", "derecha"]);
            if (decision === "izquierda") {
                this.direccion = this.direccion === 'horizontal' ? 'vertical' : 'horizontal';
                this.posicion.x -= this.direccion === 'horizontal' ? 1 : 0;
                this.posicion.y -= this.direccion === 'vertical' ? 1 : 0;
            } else if (decision === "derecha") {
                this.direccion = this.direccion === 'horizontal' ? 'vertical' : 'horizontal';
                this.posicion.x += this.direccion === 'horizontal' ? 1 : 0;
                this.posicion.y += this.direccion === 'vertical' ? 1 : 0;
            }
            this.haGirado = true;
        } else {
            // Movimiento normal
            this.posicion.x += this.direccion === 'horizontal' ? 1 : 0;
            this.posicion.y += this.direccion === 'vertical' ? 1 : 0;
        }
    }

    dibujar(tablero) {
        push();
        fill(this.color);
        let c = tablero.coordenada(this.posicion.x, this.posicion.y);
        rect(c.x, c.y, tablero.lado_celda, tablero.lado_celda);
        pop();
    }
}
