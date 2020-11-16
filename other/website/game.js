var score;
var hero;
var obstacles = [];
const INTERVAL = 200;
const HERO_COLOR = "#009999"
const OBSTACLE_COLOR = "#555555"

function startGame() {
  hero = new Component(30, 30, HERO_COLOR, 10, 200);
  score = new Component("30px", "Calibri", "#000000", 20, 40, "text");
  score.text = "Score: " + 0;
  hero.gravity = 0.05;
  gameArea.start();
}

var gameArea = {
  canvas: document.createElement("canvas"),
  start: function () {
    this.frameNumber = 0;
    this.canvas.width = 700;
    this.canvas.height = 500;
    this.context = this.canvas.getContext("2d");
    this.interval = setInterval(updateGameArea, 10);
    document.body.insertBefore(this.canvas, document.body.childNodes[0]);
  },
  clear: function () {
    this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
  },
}

function Component(width, height, color, x, y, type) {
  this.x = x;
  this.y = y;
  this.score = 0;
  this.speedX = 0;
  this.speedY = 0;
  this.gravity = 0;
  this.gravitySpeed = 0;
  this.type = type;
  this.width = width;
  this.height = height;

  this.update = function () {
    ctx = gameArea.context;

    if (this.type == "text") {
      ctx.font = this.width + " " + this.height;
      ctx.fillStyle = color;
      ctx.fillText(this.text, this.x, this.y);
    }
    else {
      ctx.fillStyle = color;
      ctx.fillRect(this.x, this.y, this.width, this.height);
    }
  }

  this.newPos = function () {
    this.gravitySpeed += this.gravity;
    this.x += this.speedX;
    this.y += this.speedY + this.gravitySpeed;
    this.hitBottom();
  }

  this.hitBottom = function () {
    var rockBottom = gameArea.canvas.height - this.height;
    if (this.y > rockBottom) {
      this.y = rockBottom;
      this.gravitySpeed = 0;
    }
  }

  this.crashWith = function (otherObj) {
    var myLeft = this.x;
    var myRight = this.x + (this.width);
    var myTop = this.y;
    var myBottom = this.y + (this.height);
    var otherLeft = otherObj.x;
    var otherRight = otherObj.x + (otherObj.width);
    var otherTop = otherObj.y;
    var otherBottom = otherObj.y + (otherObj.height);
    var crash = true;
    if ((myBottom < otherTop) || (myTop > otherBottom) || (myRight < otherLeft) || (myLeft > otherRight)) {
      crash = false;
    }

    return crash;
  }
}


function updateGameArea() {
  var x, height, gap, minHeight, maxHeight, minGap, maxGap;

  for (let i = 0; i < obstacles.length; i += 1) {
    if (hero.crashWith(obstacles[i])) return;
  }

  gameArea.clear();
  gameArea.frameNumber += 1;

  if (gameArea.frameNumber == 1 || everyInterval(200)) {
    x = gameArea.canvas.width;
    minHeight = 50;  //min height for top bar obstacle
    maxHeight = 250; //max height for top bar obstacle
    height = Math.floor(Math.random() * (maxHeight - minHeight + 1) + minHeight);
    minGap = 100; //min pixel size of gap
    maxGap = 150; //max pixel size of gap
    gap = Math.floor(Math.random() * (maxGap - minGap + 1) + minGap);
    obstacles.push(new Component(20, height, OBSTACLE_COLOR, x, 0));
    obstacles.push(new Component(20, x - height - gap, OBSTACLE_COLOR, x, height + gap));
  }

  for (let i = 0; i < obstacles.length; i += 1) {
    obstacles[i].x += -1;
    obstacles[i].update();
  }

  if (gameArea.frameNumber > 670)
    score.text = "Score: " + Math.floor((gameArea.frameNumber - 670) / 10);
  hero.newPos();
  hero.update();
  score.update();
}

function everyInterval(n) {
  if (((gameArea.frameNumber) / n) % 1 == 0) return true;
  return false;
}

function accelerate(n) {
  hero.gravity = n;
}