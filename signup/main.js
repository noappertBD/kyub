const fs = require('fs');

function register() {
    let username = document.getElementById("usr").value;
	let password = document.getElementById("pwd").value;
    let identifiants = {
        table: []
    };
    identifiants.table.push({user: username, pass: password});
    var json = JSON.stringify(identifiants);
    fs.writeFile('../index.json', json, 'utf8', callback);
}