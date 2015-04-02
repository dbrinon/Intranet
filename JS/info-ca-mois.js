function CA()
	{
		var xhr = new XMLHttpRequest();
		xhr.open('GET', 'http://127.0.0.1/test/requetes/INFO_CA_Mois.php');
		xhr.send(null);
	}
xhr.onreadystatechange = function() 
	{
		if (xhr.readyState == 4 && xhr.status == 200) 
			{
				// Votre code...
			}
	};