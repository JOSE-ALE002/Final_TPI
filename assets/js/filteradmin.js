get_movies_admin('option1');

(() => {	
    document.getElementById('inlineRadio1').addEventListener('input', async function(){
        const check = document.getElementById('inlineRadio1').value
        get_movies_admin(check);
    });
    
    document.getElementById('inlineRadio2').addEventListener('input', async function(){
        const check = document.getElementById('inlineRadio2').value
        get_movies_admin(check);
    });

    document.getElementById('inlineRadio3').addEventListener('input', async function(){
        const check = document.getElementById('inlineRadio3').value
        get_movies_admin(check);
    });
})()

async function get_movies_admin(check){
    const resultMoviesAdmin = document.getElementById('results-admin-movies')
    const options = {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		}
	}
	const request = await fetch(`/Final_TPI/filter.php?checked=${check}`)
	const selectOptions = await request.text()
	resultMoviesAdmin.innerHTML = selectOptions
}
