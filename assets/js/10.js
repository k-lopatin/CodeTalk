/* 
 * 4 Lab
 */

var x0;
var eps;
var p = 0;

/**
 * creates html and fabric canva elements
 * @returns fabric.canva
 */

function create_canvas() {
    var canvas_html = document.createElement('canvas');
    canvas_html.id = "canvas";
    canvas_html.width = 1500;
    canvas_html.height = 800;

    document.getElementById('div_canvas').appendChild(canvas_html);

    
    return canvas_html.getContext('2d');
    
    
}

/**
 * @param {fabric.canva} canva fabric canva element
 */
function drawCoordLines() {
    canva.fillStyle = '#000';
    canva.strokeStyle = '#000';
    canva.beginPath();
    canva.moveTo(300, 10);
    canva.lineTo(300, 400);
    canva.moveTo(10, 220);
    canva.lineTo(600, 220);

    canva.moveTo(290, 320);
    canva.lineTo(310, 320);

    canva.moveTo(290, 120);
    canva.lineTo(310, 120);

    canva.moveTo(200, 230);
    canva.lineTo(200, 210);

    canva.moveTo(400, 230);
    canva.lineTo(400, 210);
    
    canva.moveTo(290, 20);
    canva.lineTo(300, 10);
    canva.moveTo(310, 20);
    canva.lineTo(300, 10);
    
    canva.moveTo(590, 210);
    canva.lineTo(600, 220);
    canva.moveTo(590, 230);
    canva.lineTo(600, 220);
    
    //text = new fabric.Text('x');
   


    canva.stroke();
    canva.font = "30px Verdana";
    canva.fillText('y', 310, 15);
    canva.fillText('x', 605, 235);
    canva.font = "16px Verdana";
    canva.fillText('1', 275, 125);
    canva.fillText('-1', 269, 325);
    canva.fillText('1', 400, 245);
    canva.fillText('-1', 185, 245);
}

function func(x, p){
    //return Math.pow(0.1, x) - p*x;
    return Math.sin(x) - p*Math.pow(x, 2);
}
function func_1p(x, p){
    //return Math.log(0.1)*Math.pow(0.1, x) - p;
    return Math.cos(x) - 2*p*x;
}
function func_2p(x, p){
    //return Math.log(0.1)*Math.pow(0.1, x) - p;
    return -Math.sin(x) - 2*p;
}


function draw1() {  
    canva.clearRect( 0 , 0 , 1500 , 800 );
    drawCoordLines(canva);
    p = parseFloat( document.getElementById('p').value );

    canva.fillStyle = '#080';

    for(var x=-3; x<=3; x += 0.002)
    {
        y = func(x, p);
        xx = x*100;
        yy = y*100;
        canva.fillRect(300 + xx, 220 - yy, 1, 1);
    }     

    canva.fillStyle = '#f00';
    //canva.fillRect(200, 220 - y1*100, 5, 5);
    //canva.fillRect(400, 220 - y2*100, 5, 5);    
    
}


function newton() {
	eps = parseFloat( document.getElementById('epsN').value );
    p = parseFloat( document.getElementById('p').value );

	var x1 = -10;
	while(x1 <= 10 ){
		var isSh = Math.abs( func(x1, p)*func_2p(x1, p) )/( Math.pow( func_2p(x1, p), 2 ) );
		if( func(x1, p)*func_2p(x1, p) > 0 && isSh < 1 ){
			break;
		}
		x1 += 0.5;
	}



    var count = 0;
    var x = x1;

    canva.beginPath();
    
    canva.strokeStyle = '#c00';
    while(count < 1000){
        var x_old = x;
        x -= func(x, p)/func_1p(x, p);

        canva.moveTo( 300 + x_old*100, 220 - func(x_old, p)*100 );
        canva.lineTo( 300 + x*100, 220);
        console.log(x_old);
        count ++;
        if( Math.abs(x - x_old) < eps ) break;

    }    
    canva.stroke();

    document.getElementById('answerN').innerHTML = 'Количество итераций: '+count+'<br/>';
    document.getElementById('answerN').innerHTML += 'x0 = '+x1.toFixed(6)+'<br/>';
    document.getElementById('answerN').innerHTML += 'x = '+x.toFixed(6)+'<br/>';    

    //draw(canva, y1, y2, f1, f2);
}



window.onload = function() {
    window.canva = create_canvas();
    drawCoordLines();
}
