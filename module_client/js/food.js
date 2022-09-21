const score = document.getElementById('output');

class Food {
    constructor({canvas, ctx, grid, snake}) {
        this.canvas = canvas; 
        this.ctx = ctx;
        this.grid = grid;
        this.snake = snake;

        this.color = 'red';
        this.score = 0;

        this.food = [
            this.random(),
            this.random(),
            this.random(),
        ];

        // Add food
        setInterval(() => {
            (this.food.length < 5) && this.food.unshift(this.random());
        }, 3000);

        // Remove food
        setInterval(() => {
            this.food.pop();
        }, 5000);
    }

    random() {
        const x = Math.floor(Math.random() * this.grid.x);
        const y = Math.floor(Math.random() * this.grid.y);

        return [x, y];
    }

    draw() {
        this.food.forEach(([x, y], index) =>  {
            // Disappeared when the snake ate the food
            if (this.snake.x === x && this.snake.y === y) {
                this.snake.length += 1;
                this.food.splice(index, 1);

                // score
                this.score += 1;
                score.innerText = this.score;
                
            }

            // Draw the food
            this.ctx.beginPath();
            this.ctx.fillStyle = this.color;
            this.ctx.rect(x * this.grid.width, y * this.grid.height, this.grid.width, this.grid.height);
            this.ctx.fill();
            this.ctx.closePath();
        })
    }
}

export default Food;