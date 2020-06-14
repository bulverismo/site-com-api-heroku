var mysql = require('mysql');
const express = require('express');

//base de dados
var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "curicalinda",
  database: "hellcode"
});



const app = express();
const port = process.env.PORT || 3000;
app.listen(port, () => console.log(`Ouvindo na porta ${port}`));
app.use(express.static('public'));
app.use(express.json({ limit: '1mb' }));

app.get('/api/listarperguntas', async (request, response) => {


  con.query("SELECT * FROM usuarios", function (err, result, fields) {
    console.log(result);
    response.json(result);
  });


    
})


app.post('/api', (request, response) => {

  const data = request.body;
  const timestamp = Date.now();
  data.timestamp = timestamp;
  //console.log(data);
  console.log("--------------------");
  console.log('Dados foram salvos no banco');
  database.insert(data); 
  response.json(data);

});
