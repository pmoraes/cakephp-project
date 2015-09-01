var myScroll;

function loaded () {
	myScroll = new IScroll('.bg-product', { mouseWheel: true });
}

document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);