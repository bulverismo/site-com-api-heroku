var mysql = require('mysql');
const { Pool } = require('pg');

const express = require('express');

//base de dados
//var con = mysql.createConnection({
//  host: "localhost",
//  user: "root",
//  password: "curicalinda",
//  database: "hellcode"
//});

const pool = new Pool({
  connectionString: process.env.DATABASE_URL,
  ssl: {
    rejectUnauthorized: false
  }
});


const app = express();
const port = process.env.PORT || 3000;
app.listen(port, () => console.log(`Ouvindo na porta ${port}`));
app.use(express.static('public'));
app.use(express.json({ limit: '1mb' }));

app.get('/db', async (req, res) => {
  try {
    const client = await pool.connect();
    const result = await client.query('SELECT * FROM duvidas');
    const results = { 'results': (result) ? result.rows : null};
    res.json(results );
    client.release();
  } catch (err) {
    console.error(err);
    res.send("Error " + err);
  }
})
app.get('/api/listarperguntas', async (request, response) => {


 // con.query("SELECT * FROM usuarios", function (err, result, fields) {
 //   console.log(result);
 //   response.json(result);
 // });

    response.json('result');

    
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
