get_Movies();

(() => {	
    document.getElementById('search').addEventListener('input', async function(){
			get_Movies();
	});

	document.getElementById('inputGroupSelect04').addEventListener('change', async (event) => {
		document.getElementById('defaultCheck1').checked = 0
		get_Movies();
	});

	document.getElementById('defaultCheck1').addEventListener('change', async function() {
		if(this.checked) {
			var popularity = document.getElementById('defaultCheck1').value
			get_Movies(popularity)
		}else{
			get_Movies();
		}

	});

})()

async function get_Movies(popularity){
	const resultMovies = document.getElementById('results-movies')
	var valueSearch = document.getElementById('search').value
	var orderSelect = document.getElementById('inputGroupSelect04').value

	if(popularity == undefined){
		popularity = 0;
	}
	const options = {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		}
	}
	const request = await fetch(`/Final_TPI/filter.php?movies=${valueSearch}&orderBy=${orderSelect}&popularity=${popularity}`)
	const selectOptions = await request.text()
	resultMovies.innerHTML = selectOptions
}

