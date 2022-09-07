document.querySelectorAll('.accordion').forEach( button => {
    button.onclick = function () {

		document.querySelectorAll('.accordion-text').forEach( item => {
				item.classList.remove('open');
				item.classList.add('closed');
		});
		
		button.querySelectorAll('.accordion-text').forEach ( tag => {
				if( tag.classList.contains('closed')) {
					tag.classList.remove('closed');
					tag.classList.add('open');
				}
		});
    }
});