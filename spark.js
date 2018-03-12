  "use strict";
(function() {
 
    var Base, Particle, canvas, colors, context, drawables, i, mouseX, mouseY, mouseVX, mouseVY, rand, click, min, max, colors, particles, Cwidth, Cheight, GradientColors, CanvasEl;
 
    CanvasEl = "bg"; //Canvas的ID
    min = Math.round($('#jl_min').val()); //最小光点直径
    max = Math.round($('#jl_max').val()); //最大光点直径
    particles = Math.floor($(window).width()/1920*60);
    Cwidth = $('.home_goddesses').width();
    Cheight = $('.home_goddesses').height();
    colors = [$('#jl_colors').val()]; //光点中间的颜色注意和晕开颜色顺序配对
    GradientColors = [$('#jl_GradientColors').val()]; //光点晕开的颜色色注意和中间颜色顺序配对
    rand = function(a, b) {
        return Math.random() * (b - a) + a;
    };
	$(window).resize(function(){
		Cwidth = $('.home_goddesses').width();
    	Cheight = $('.home_goddesses').height();
	});
 
    Particle = (function() {
        function Particle() {
            this.reset();
        }
 
        Particle.prototype.reset = function() {
            var colorSel = Math.random();
            this.color = colors[~~ (colorSel * colors.length)];
            this.GradientColors = GradientColors[~~ (colorSel * GradientColors.length)];
            this.radius = rand(min, max);
            this.x = rand(0, canvas.width);
            this.y = rand(100, canvas.height);
            this.vx = -5 + Math.random() * 10;
            this.vy = (Math.random() - 0.5) * this.radius;
            this.valpha = rand(0.02, 0.09);
            this.opacity = 0;
            this.life = 0;
            this.onupdate = undefined;
            this.type = "dust";
        };
 
        Particle.prototype.update = function() {
            this.x = (this.x + this.vx / 6);
            this.y = (this.y + this.vy / 6);
 
            if (this.opacity >= 1 && this.valpha > 0) this.valpha *= -1;
            this.opacity += this.valpha / 8;
            this.life += this.valpha / 8;
 
            if (this.type === "dust") this.opacity = Math.min(1, Math.max(0, this.opacity));
            else this.opacity = 1;
 
            if (this.onupdate) this.onupdate();
            if (this.life < 0 || this.radius <= 0 || this.y > canvas.height) {
                this.onupdate = undefined;
                this.reset();
            }
        };
 
        Particle.prototype.draw = function(c) {
            var grd = c.createRadialGradient(this.x, this.y, 0, this.x, this.y, this.radius * 4);
            grd.addColorStop(0, "rgba(" + this.GradientColors + ", " + Math.min(this.opacity - 0.2, 0.65) + ")");
            grd.addColorStop(1, "rgba(" + this.GradientColors + ", " + '0' + ")");
            c.fillStyle = grd;
 
            c.beginPath();
            c.arc(this.x, this.y, this.radius * 4, 2 * Math.PI, false);
            c.fill();
 
            c.strokeStyle = "rgba(" + this.color + ", " + Math.min(this.opacity, 0.85) + ")";
            c.fillStyle = "rgba(" + this.color + ", " + Math.min(this.opacity, 0.65) + ")";
            c.beginPath();
            c.arc(this.x, this.y, this.radius, 2 * Math.PI, false);
            c.fill();
        };
 
        return Particle;
 
    })();
 
    mouseVX = mouseVY = mouseX = mouseY = 0;
 
    canvas = document.getElementById(CanvasEl);
    context = canvas.getContext("2d");
    canvas.width = Cwidth;
    canvas.height = Cheight;
 
    drawables = (function() {
        var _i, _results;
        _results = [];
        for (i = _i = 1; _i <= particles; i = ++_i) {
            _results.push(new Particle);
        }
        return _results;
    })();
 
    function draw() {
        window.requestAnimFrame(draw);
        var d, _i, _len;
        canvas.width = Cwidth;
        canvas.height = Cheight;
        context.clearRect(0, 0, canvas.width, canvas.height)
 
        for (_i = 0, _len = drawables.length; _i < _len; _i++) {
            d = drawables[_i];
            d.draw(context);
        }
    };
 
    function update() {
        window.requestAnimFrame(update);
        var d, _i, _len, _results;
        _results = [];
        for (_i = 0, _len = drawables.length; _i < _len; _i++) {
            d = drawables[_i];
            _results.push(d.update());
        }
        return _results;
    };
 
    document.onmousemove = function(e) {
        mouseVX = mouseX;
        mouseVY = mouseY;
        mouseX = ~~e.pageX;
        mouseY = ~~e.pageY;
        mouseVX = ~~ ((mouseVX - mouseX) / 2);
        mouseVY = ~~ ((mouseVY - mouseY) / 2);
 
    };
 
    window.addEventListener('resize', draw, false);
    window.requestAnimFrame = (function() {
        return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame ||
        function(callback) {
            window.setTimeout(callback, 1000 / 60);
        };
    })();
    window.requestAnimFrame(draw);
    window.requestAnimFrame(update);
}).call(this);
