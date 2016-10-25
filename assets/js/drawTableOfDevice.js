/**
 * 
 */

document.addEventListener('DOMContentLoaded', function() {
	
	Ajax.request('GET', 'Handler/device.php', true, function (response) {
		//console.log('response   --->' + response);		
		data = JSON.parse(response);		
		//console.log(data[0]['email']);		
		displayUSers(data);
	});

}, false);

function displayUSers(data) {
	var tbody = document.getElementsByTagName('tbody')[0];
		
	for (var i = 0; i < data.length; i++) {
		var tr = document.createElement('tr');
	
		var tdNumber = document.createElement('td');
		var tdName = document.createElement('td');
		var tdEmail = document.createElement('td');
		
		tdNumber.innerHTML = (i+1);
		tdName.innerHTML = data[i]['name'];
		tdEmail.innerHTML = data[i]['email'];
		
		tr.appendChild(tdNumber);
		tr.appendChild(tdName);
		tr.appendChild(tdEmail);
		
		tbody.appendChild(tr);
	}
	
}
